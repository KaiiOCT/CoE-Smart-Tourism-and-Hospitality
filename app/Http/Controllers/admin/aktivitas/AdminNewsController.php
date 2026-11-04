<?php

namespace App\Http\Controllers\admin\aktivitas;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use PhpOffice\PhpWord\IOFactory as WordIOFactory;
use Smalot\PdfParser\Parser as PdfParser;

class AdminNewsController extends Controller
{
    public function index()
    {
        $news = News::with('category')->latest()->get();
        return view('admin.aktivitas.news.index', compact('news'));
    }

    public function create()
    {
        $categories = NewsCategory::all();
        return view('admin.aktivitas.news.create', compact('categories'));
    }

public function store(Request $request)
{
    $validated = $request->validate([
        'title'         => 'required|string|max:255',
        'description'   => 'required|string',
        'type'          => 'required|in:internal,external',
        'link'          => 'nullable|url|required_if:type,external',
        'content'       => 'nullable|string',
        'document_file' => 'nullable|file|mimes:docx,pdf|max:10240',
        'date'          => 'required|date',
        'category_id'   => 'required|exists:news_categories,id',
        'is_main'       => 'nullable|boolean',
        'photo'         => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    // Ekstraksi dokumen jika diunggah
    if ($request->hasFile('document_file')) {
        $extractedContent = $this->extractTextFromDocument($request->file('document_file'));
        if ($extractedContent) {
            $validated['content'] = !empty($validated['content']) 
                ? $validated['content'] . '<br><br>' . $extractedContent 
                : $extractedContent;
        }
    }

    // Hapus document_file dari array validated agar tidak masuk ke query insert
    unset($validated['document_file']);

    $validated['is_main'] = $request->boolean('is_main');

    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('news', 'public');
        $validated['photo'] = $photoPath;
    }

    // Pengaturan Slug & Link
    if ($request->type === 'internal') {
        $validated['link'] = $request->link ?? ''; // Gunakan "" (bukan null) agar aman di MySQL
        $validated['slug'] = Str::slug($request->title) . '-' . Str::random(5);
    } else {
        $validated['slug'] = null;
    }

    News::create($validated);

    return redirect()->route('admin.news.index')
        ->with('success', 'Berita berhasil dipublikasikan');
}

    public function edit(News $news)
    {
        $categories = NewsCategory::all();
        return view('admin.aktivitas.news.edit', compact('news', 'categories'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title'         => 'required|string|max:255',
            'description'   => 'required|string',
            'type'          => 'required|in:internal,external',
            'link'          => 'nullable|url|required_if:type,external',
            'content'       => 'nullable|string',
            'document_file' => 'nullable|file|mimes:docx,pdf|max:10240',
            'date'          => 'required|date',
            'category_id'   => 'required|exists:news_categories,id',
            'is_main'       => 'nullable|boolean',
            'photo'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Ekstraksi dokumen baru jika diunggah saat edit
        if ($request->hasFile('document_file')) {
            $extractedContent = $this->extractTextFromDocument($request->file('document_file'));
            if ($extractedContent) {
                $validated['content'] = $extractedContent;
            }
        }

        $validated['is_main'] = $request->boolean('is_main');

        if ($request->hasFile('photo')) {
            if ($news->photo && Storage::disk('public')->exists($news->photo)) {
                Storage::disk('public')->delete($news->photo);
            }
            $photoPath = $request->file('photo')->store('news', 'public');
            $validated['photo'] = $photoPath;
        }

        // Update slug jika tipe internal
        if ($request->type === 'internal') {
            if (empty($news->slug) || $news->title !== $request->title) {
                $validated['slug'] = Str::slug($request->title) . '-' . Str::random(5);
            }
        } else {
            $validated['slug'] = null;
        }

        $news->update($validated);

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil diperbarui');
    }

    public function destroy(News $news)
    {
        if ($news->photo && Storage::disk('public')->exists($news->photo)) {
            Storage::disk('public')->delete($news->photo);
        }
        
        $news->delete();

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil dihapus');
    }

    /**
     * Helper Function: Ekstraksi teks dari file .docx atau .pdf
     */
    private function extractTextFromDocument($file): ?string
    {
        $extension = strtolower($file->getClientOriginalExtension());
        $htmlOutput = '';

        try {
            if ($extension === 'docx') {
                // Konversi Word ke HTML menggunakan PHPWord
                $phpWord = WordIOFactory::load($file->getRealPath());
                $xmlWriter = WordIOFactory::createWriter($phpWord, 'HTML');
                
                ob_start();
                $xmlWriter->save('php://output');
                $rawHtml = ob_get_clean();

                // Bersihkan tag body & html dari output PHPWord agar menyatu halus di view
                preg_match('/<body[^>]*>(.*?)<\/body>/is', $rawHtml, $matches);
                $htmlOutput = isset($matches[1]) ? $matches[1] : $rawHtml;

            } elseif ($extension === 'pdf') {
                // Ekstraksi Teks PDF menggunakan Smalot PdfParser
                $parser = new PdfParser();
                $pdf = $parser->parseFile($file->getRealPath());
                $text = $pdf->getText();
                
                // Ubah pemisah baris (\n) menjadi tag paragraf / <br> HTML
                $htmlOutput = nl2br(e($text));
            }
        } catch (\Exception $e) {
            return null;
        }

        return trim($htmlOutput);
    }
}