<div>
    <aside
        id="logo-sidebar"
        class="fixed left-0 top-0 z-40 h-screen w-64 -translate-x-full border-r border-gray-200 bg-white pt-20 transition-transform sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full overflow-y-auto bg-white px-3 pb-4">
            <ul class="space-y-2 font-medium">
                <li>
                    <a
                        href="{{ route('admin.index') }}"
                        class="{{ Request::is('admin') ? 'bg-yellow-400' : 'hover:bg-gray-100' }} flex items-center rounded-lg p-2 text-gray-900">
                        <svg
                            class="h-5 w-5 {{ Request::is('admin') ? 'text-gray-800' : 'text-gray-500' }} transition duration-75"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                fill-rule="evenodd"
                                d="M21.7 8.037a4.26 4.26 0 0 0-.789-1.964 2.84 2.84 0 0 0-1.984-.839c-2.767-.2-6.926-.2-6.926-.2s-4.157 0-6.928.2a2.836 2.836 0 0 0-1.983.839 4.225 4.225 0 0 0-.79 1.965 30.146 30.146 0 0 0-.2 3.206v1.5a30.12 30.12 0 0 0 .2 3.206c.094.712.364 1.39.784 1.972.604.536 1.38.837 2.187.848 1.583.151 6.731.2 6.731.2s4.161 0 6.928-.2a2.844 2.844 0 0 0 1.985-.84 4.27 4.27 0 0 0 .787-1.965 30.12 30.12 0 0 0 .2-3.206v-1.516a30.672 30.672 0 0 0-.202-3.206Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="ml-3">Project Terkini</span>
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('admin.activity') }}"
                        class="{{ Request::is('admin/aktivitas*') ? 'bg-yellow-400' : 'hover:bg-gray-100' }} flex items-center rounded-lg p-2 text-gray-900">
                        <svg
                            class="h-5 w-5 {{ Request::is('admin/aktivitas*') ? 'text-gray-800' : 'text-gray-500' }} transition duration-75"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                fill-rule="evenodd"
                                d="M5 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h11.5c.07 0 .14-.007.207-.021.095.014.193.021.293.021h2a2 2 0 0 0 2-2V7a1 1 0 0 0-1-1h-1a1 1 0 1 0 0 2v11h-2V5a2 2 0 0 0-2-2H5Zm7 4a1 1 0 0 1 1-1h.5a1 1 0 1 1 0 2H13a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h.5a1 1 0 1 1 0 2H13a1 1 0 0 1-1-1Zm-6 4a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H7a1 1 0 0 1-1-1ZM7 6a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H7Zm1 3V8h1v1H8Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="ml-3">Aktivitas</span>
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('admin.member.index') }}"
                        class="{{ Request::is('admin/member*') ? 'bg-yellow-400' : 'hover:bg-gray-100' }} flex items-center rounded-lg p-2 text-gray-900">
                        <svg
                            class="h-5 w-5 {{ Request::is('admin/member*') ? 'text-gray-800' : 'text-gray-500' }} transition duration-75"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                fill-rule="evenodd"
                                d="M8 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4H6Zm7.25-2.095c.478-.86.75-1.85.75-2.905a5.973 5.973 0 0 0-.75-2.906 4 4 0 1 1 0 5.811ZM15.466 20c.34-.588.535-1.271.535-2v-1a5.978 5.978 0 0 0-1.528-4H18a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2h-4.535Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="ml-3">Anggota</span>
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('admin.timeline.index') }}"
                        class="{{ Request::is('admin/timeline*') ? 'bg-yellow-400' : 'hover:bg-gray-100' }} flex items-center rounded-lg p-2 text-gray-900">
                        <svg
                            class="h-5 w-5 {{ Request::is('admin/timeline*') ? 'text-gray-800' : 'text-gray-500' }} transition duration-75"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                fill-rule="evenodd"
                                d="M5 5a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1h1a1 1 0 0 0 1-1 1 1 0 1 1 2 0 1 1 0 0 0 1 1 2 2 0 0 1 2 2v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V7a2 2 0 0 1 2-2ZM3 19v-7a1 1 0 0 1 1-1h16a1 1 0 0 1 1 1v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2Z"
                                clip-rule="evenodd" />
                        </svg>
                        <span class="ml-3">Timeline</span>
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('admin.program.index') }}"
                        class="{{ Request::is('admin/program*') ? 'bg-yellow-400' : 'hover:bg-gray-100' }} flex items-center rounded-lg p-2 text-gray-900">
                        <svg
                            class="h-5 w-5 {{ Request::is('admin/program*') ? 'text-gray-800' : 'text-gray-500' }} transition duration-75"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24">
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="m8 8-4 4 4 4m8 0 4-4-4-4m-2-3-4 14" />
                        </svg>
                        <span class="ml-3">Program</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
</div>