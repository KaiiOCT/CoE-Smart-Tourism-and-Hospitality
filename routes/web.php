<?php

// use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\History\HistoryController;
use App\Http\Controllers\Team\TeamController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\Research\ResearchController;
use App\Http\Controllers\Innovation\InnovationController;
use App\Http\Controllers\Bussines\BussinesController;
use App\Http\Controllers\CommunityService\CommunityServiceController;
use App\Http\Controllers\Intern\InternController;
use App\Http\Controllers\collaboration\CollaborationController;
use App\Http\Controllers\admin\aktivitas\AdminAktivitasController;
use App\Http\Controllers\admin\aktivitas\AdminNewsController;
use App\Http\Controllers\Journal\JournalController;
use App\Http\Controllers\Training\TrainingController;
use App\Http\Controllers\Shop\ShopController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\admin\aktivitas\AdminResearchController;
use App\Http\Controllers\admin\aktivitas\AdminJournalController;
use App\Http\Controllers\admin\aktivitas\AdminInnovationController;
use App\Http\Controllers\admin\aktivitas\AdminBusinessController;
use App\Http\Controllers\admin\aktivitas\AdminComunityController;
use App\Http\Controllers\admin\aktivitas\AdminShopController;
use App\Http\Controllers\admin\aktivitas\AdminTrainingController;
use App\Http\Controllers\admin\aktivitas\AdminServiceController;
use App\Http\Controllers\admin\aktivitas\AdminInnovilageController;
use App\Http\Controllers\admin\member\AdminMemberController;
use App\Http\Controllers\admin\member\AdminInternalController;
use App\Http\Controllers\admin\member\AdminStudentController;
use App\Http\Controllers\admin\timeline\AdminTimelineController;
use App\Http\Controllers\admin\program\AdminProgramController;
use App\Http\Controllers\admin\program\AdminInterController;
use App\Http\Controllers\admin\program\AdminPartnerController;
use App\Http\Controllers\Innovillage\InnovillageController;

Route::get('/', [WelcomeController::class, 'index']);
Route::get('/', [WelcomeController::class, 'index'])->name('home');
Route::get('/history', [HistoryController::class, 'index'])->name('history.index');
Route::get('/anggota', [TeamController::class, 'index'])->name('team.index');
Route::get('/anggota/{memberId}', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/riset', [ResearchController::class, 'index'])->name('research.index');
Route::get('/inovasi', [InnovationController::class, 'index'])->name('innovation.index');
Route::get('/inovasi/{id}', [InnovationController::class, 'show'])->name('innovation.show');
Route::get('/bisnis', [BussinesController::class, 'index'])->name('business.index');
Route::get('/pengabdian-masyarakat', [CommunityServiceController::class, 'index'])->name('community-service.index');
Route::get('/pengabdian-masyarakat/{id}', [CommunityServiceController::class, 'show'])->name('community-service.show');
Route::get('/magang', [InternController::class, 'index'])->name('intern.index');
Route::get('/kerja-sama', [CollaborationController::class, 'index'])->name('collaboration.index');
Route::get('/jurnal', [JournalController::class, 'index'])->name('journal.index');
Route::get('/jurnal/{id}', [JournalController::class, 'show'])->name('journal.show');
Route::get('/innovillage', [InnovillageController::class, 'index'])->name('innovillage.index');
Route::get('/innovillage/{innovillage}', [InnovillageController::class, 'show'])->name('innovillage.show');
Route::get('/training', [TrainingController::class, 'index'])->name('training.index');
Route::get('/training/{training}', [TrainingController::class, 'show'])->name('training.show');
Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('index');
        Route::get('/home', function () {
            return view('dashboard');
        })->name('home');

        Route::get('/project/create', [AdminController::class, 'create'])->name('project.create');
        Route::post('/project', [AdminController::class, 'store'])->name('project.store');
        Route::get('/project/{project}/edit', [AdminController::class, 'edit'])->name('project.edit');
        Route::put('/project/{project}', [AdminController::class, 'update'])->name('project.update');
        Route::delete('/project/{project}', [AdminController::class, 'destroy'])->name('project.destroy');

        Route::get('/aktivitas', [AdminAktivitasController::class, 'index'])->name('activity');
        Route::get('/aktivitas/research', [AdminResearchController::class, 'index'])->name('research');

        // Journal Management Routes
        Route::prefix('aktivitas/journal')->name('journal.')->group(function() {
            Route::get('/', [AdminJournalController::class, 'index'])->name('index');
            Route::get('/create', [AdminJournalController::class, 'create'])->name('create');
            Route::post('/', [AdminJournalController::class, 'store'])->name('store');
            Route::get('/{journal}/edit', [AdminJournalController::class, 'edit'])->name('edit');
            Route::put('/{journal}', [AdminJournalController::class, 'update'])->name('update');
            Route::delete('/{journal}', [AdminJournalController::class, 'destroy'])->name('destroy');
        });

        // Innovation Management Routes
        Route::prefix('innovation')->name('innovation.')->group(function() {
            Route::get('/', [AdminInnovationController::class, 'index'])->name('index');
            Route::get('/create', [AdminInnovationController::class, 'create'])->name('create');
            Route::post('/', [AdminInnovationController::class, 'store'])->name('store');
            Route::get('/{innovation}/edit', [AdminInnovationController::class, 'edit'])->name('edit');
            Route::put('/{innovation}', [AdminInnovationController::class, 'update'])->name('update');
            Route::delete('/{innovation}', [AdminInnovationController::class, 'destroy'])->name('destroy');
        });

        Route::get('/aktivitas/business', [AdminBusinessController::class, 'index'])->name('business');

        // Shop Management Routes
        Route::prefix('aktivitas/shop')->name('shop.')->group(function() {
            Route::get('/', [AdminShopController::class, 'index'])->name('index');
            Route::get('/create', [AdminShopController::class, 'create'])->name('create');
            Route::post('/', [AdminShopController::class, 'store'])->name('store');
            Route::get('/{shop}/edit', [AdminShopController::class, 'edit'])->name('edit');
            Route::put('/{shop}', [AdminShopController::class, 'update'])->name('update');
            Route::delete('/{shop}', [AdminShopController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('aktivitas/innovilage')->name('innovilage.')->group(function() {
            Route::get('/', [AdminInnovilageController::class, 'index'])->name('index');
            Route::get('/create', [AdminInnovilageController::class, 'create'])->name('create');
            Route::post('/', [AdminInnovilageController::class, 'store'])->name('store');
            Route::get('/{innovilage}/edit', [AdminInnovilageController::class, 'edit'])->name('edit');
            Route::put('/{innovilage}', [AdminInnovilageController::class, 'update'])->name('update');
            Route::delete('/{innovilage}', [AdminInnovilageController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('aktivitas/training')->name('training.')->group(function() {
            Route::get('/', [AdminTrainingController::class, 'index'])->name('index');
            Route::get('/create', [AdminTrainingController::class, 'create'])->name('create');
            Route::post('/', [AdminTrainingController::class, 'store'])->name('store');
            Route::get('/{training}/edit', [AdminTrainingController::class, 'edit'])->name('edit');
            Route::put('/{training}', [AdminTrainingController::class, 'update'])->name('update');
            Route::delete('/{training}', [AdminTrainingController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('member')->name('member.')->group(function() {
            Route::get('/', [AdminMemberController::class, 'index'])->name('index');
        });

        // Update internal member routes
        Route::prefix('internal-member')->name('internal-member.')->group(function() {
            Route::get('/', [AdminInternalController::class, 'index'])->name('index');
            Route::get('/create', [AdminInternalController::class, 'create'])->name('create');
            Route::post('/', [AdminInternalController::class, 'store'])->name('store');
            Route::get('/{member}/edit', [AdminInternalController::class, 'edit'])->name('edit');
            Route::put('/{member}', [AdminInternalController::class, 'update'])->name('update');
            Route::delete('/{member}', [AdminInternalController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('student-member')->name('student-member.')->group(function() {
            Route::get('/', [AdminStudentController::class, 'index'])->name('index');
            Route::get('/create', [AdminStudentController::class, 'create'])->name('create');
            Route::post('/', [AdminStudentController::class, 'store'])->name('store');
            Route::get('/{member}/edit', [AdminStudentController::class, 'edit'])->name('edit');
            Route::put('/{member}', [AdminStudentController::class, 'update'])->name('update');
            Route::delete('/{member}', [AdminStudentController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('aktivitas/community-service')->name('community-service.')->group(function() {
            Route::get('/', [AdminComunityController::class, 'index'])->name('index');
        });

        Route::prefix('aktivitas/service')->name('service.')->group(function() {
            Route::get('/', [AdminServiceController::class, 'index'])->name('index');
            Route::get('/create', [AdminServiceController::class, 'create'])->name('create');
            Route::post('/', [AdminServiceController::class, 'store'])->name('store');
            Route::get('/{service}/edit', [AdminServiceController::class, 'edit'])->name('edit');
            Route::put('/{service}', [AdminServiceController::class, 'update'])->name('update');
            Route::delete('/{service}', [AdminServiceController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('timeline')->name('timeline.')->group(function() {
            Route::get('/', [AdminTimelineController::class, 'index'])->name('index');
            Route::get('/create', [AdminTimelineController::class, 'create'])->name('create');
            Route::post('/', [AdminTimelineController::class, 'store'])->name('store');
            Route::get('/{timeline}/edit', [AdminTimelineController::class, 'edit'])->name('edit');
            Route::put('/{timeline}', [AdminTimelineController::class, 'update'])->name('update');
            Route::delete('/{timeline}', [AdminTimelineController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('program')->name('program.')->group(function() {
            Route::get('/', [AdminProgramController::class, 'index'])->name('index');
        });

        Route::prefix('partner')->name('partner.')->group(function() {
            Route::get('/', [AdminPartnerController::class, 'index'])->name('index');
            Route::get('/create', [AdminPartnerController::class, 'create'])->name('create');
            Route::post('/', [AdminPartnerController::class, 'store'])->name('store');
            Route::get('/{partner}/edit', [AdminPartnerController::class, 'edit'])->name('edit');
            Route::put('/{partner}', [AdminPartnerController::class, 'update'])->name('update');
            Route::delete('/{partner}', [AdminPartnerController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('intern')->name('intern.')->group(function() {
            Route::get('/', [AdminInterController::class, 'index'])->name('index');
            Route::get('/create', [AdminInterController::class, 'create'])->name('create');
            Route::post('/', [AdminInterController::class, 'store'])->name('store');
            Route::get('/{intern}/edit', [AdminInterController::class, 'edit'])->name('edit');
            Route::put('/{intern}', [AdminInterController::class, 'update'])->name('update');
            Route::delete('/{intern}', [AdminInterController::class, 'destroy'])->name('destroy');
        });

        // News Management Routes
        Route::prefix('news')->name('news.')->group(function() {
            Route::get('/', [AdminNewsController::class, 'index'])->name('index');
            Route::get('/create', [AdminNewsController::class, 'create'])->name('create');
            Route::post('/', [AdminNewsController::class, 'store'])->name('store');
            Route::get('/{news}/edit', [AdminNewsController::class, 'edit'])->name('edit');
            Route::put('/{news}', [AdminNewsController::class, 'update'])->name('update');
            Route::delete('/{news}', [AdminNewsController::class, 'destroy'])->name('destroy');
        });
    });
});

require __DIR__ . '/auth.php';
