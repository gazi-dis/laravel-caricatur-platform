<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('admin.index') }}"
                        aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                            class="hide-menu">Yönetim</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('admin.settings') }}"
                        aria-expanded="false"><i data-feather="settings" class="feather-icon"></i><span
                            class="hide-menu">Site Ayarları</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('admin.profil') }}"
                        aria-expanded="false"><i data-feather="user" class="feather-icon"></i><span
                            class="hide-menu">Profil</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('admin.posts') }}"
                        aria-expanded="false"><i data-feather="grid" class="feather-icon"></i><span
                            class="hide-menu">İçerikler</span></a></li>


            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->