<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link {{ Route::current()->getName()=='administrator.dashboard' ? '' : 'collapsed' }}" href="{{ route('administrator.dashboard') }}">
                <i class="bi bi-sliders"></i>
                <span>Dashboard</span>
            </a>
        <li class="nav-item">
            <a class="nav-link {{ Route::current()->getName()=='administrator.blog.index' ? '' :
                 (Route::current()->getName()=='administrator.blog.edit' ? '' : 
                 (Route::current()->getName()=='administrator.blog.create' ? ''  : 'collapsed')) }}" href="{{ route('administrator.blog.index') }}">
                <i class="bi bi-book"></i>
                <span>Blog</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::current()->getName()=='administrator.mitra.index' ? '' :
                 (Route::current()->getName()=='administrator.mitra.edit' ? '' : 
                 (Route::current()->getName()=='administrator.mitra.create' ? ''  : 'collapsed')) }}" href="{{ route('administrator.mitra.index') }}">
                <i class="bi bi-list"></i>
                <span>Mitra/Client</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::current()->getName()=='administrator.service.index' ? '' :
                 (Route::current()->getName()=='administrator.service.edit' ? '' : 
                 (Route::current()->getName()=='administrator.service.create' ? ''  : 'collapsed')) }}" href="{{ route('administrator.service.index') }}">
                <i class="bi bi-menu-up"></i>
                <span>Service</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::current()->getName()=='administrator.myteam.index' ? '' :
                 (Route::current()->getName()=='administrator.myteam.edit' ? '' : 
                 (Route::current()->getName()=='administrator.myteam.create' ? ''  : 'collapsed')) }}" href="{{ route('administrator.myteam.index') }}">
                <i class="ri ri-group-line"></i>
                <span>My Team</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::current()->getName()=='administrator.project-gallery.index' ? '' :
                 (Route::current()->getName()=='administrator.project-gallery.edit' ? '' : 
                 (Route::current()->getName()=='administrator.project-gallery.create' ? ''  : 'collapsed')) }}" href="{{ route('administrator.project-gallery.index') }}">
                <i class="bi bi-card-image"></i>
                <span>Project Gallery</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Route::current()->getName()=='administrator.portofolio.index' ? '' :
                 (Route::current()->getName()=='administrator.portofolio.edit' ? '' : 
                 (Route::current()->getName()=='administrator.portofolio.create' ? ''  : 'collapsed')) }}" href="{{ route('administrator.portofolio.index') }}">
                <i class="bi bi-clipboard-check "></i>
                <span>Portofolio</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#layanan-nav" data-bs-toggle="collapse" href="#" aria-expanded="true">
                <i class="bi bi-briefcase"></i><span>Master Data</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="layanan-nav" class="nav-content" data-bs-parent="#layanan-nav">
                <li>
                    <a class="nav-link {{ Route::current()->getName()=='administrator.slider.index' ? '' :
                 (Route::current()->getName()=='administrator.slider.edit' ? '' : 
                 (Route::current()->getName()=='administrator.slider.create' ? ''  : 'collapsed')) }}" href="{{ route('administrator.slider.index') }}">
                        <i class="bi bi-circle"></i><span>Slidder</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ Route::current()->getName()=='administrator.slider-service.index' ? '' :
                 (Route::current()->getName()=='administrator.slider-service.edit' ? '' : 
                 (Route::current()->getName()=='administrator.slider-service.create' ? ''  : 'collapsed')) }}" href="{{ route('administrator.slider-service.index') }}">
                        <i class="bi bi-circle"></i><span>Slidder Service</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ Route::current()->getName()=='administrator.service-category.index' ? '' :
                 (Route::current()->getName()=='administrator.service-category.edit' ? '' : 
                 (Route::current()->getName()=='administrator.service-category.create' ? ''  : 'collapsed')) }}" href="{{ route('administrator.service-category.index') }}">
                        <i class="bi bi-circle"></i><span>Service Category</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ Route::current()->getName()=='administrator.portofolio-category.index' ? '' :
                 (Route::current()->getName()=='administrator.portofolio-category.edit' ? '' : 
                 (Route::current()->getName()=='administrator.portofolio-category.create' ? ''  : 'collapsed')) }}" href="{{ route('administrator.portofolio-category.index') }}">
                        <i class="bi bi-circle"></i><span>Portifolio Category</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ Route::current()->getName()=='administrator.blog-category.index' ? '' :
                 (Route::current()->getName()=='administrator.blog-category.edit' ? '' : 
                 (Route::current()->getName()=='administrator.blog-category.create' ? ''  : 'collapsed')) }}" href="{{ route('administrator.blog-category.index') }}">
                        <i class="bi bi-circle"></i><span>Blog Category</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ Route::current()->getName()=='administrator.service-testimony.index' ? '' :
                 (Route::current()->getName()=='administrator.service-testimony.edit' ? '' : 
                 (Route::current()->getName()=='administrator.service-testimony.create' ? ''  : 'collapsed')) }}" href="{{ route('administrator.service-testimony.index') }}">
                        <i class="bi bi-circle"></i><span>Service Testimony</span>
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ Route::current()->getName()=='administrator.menu.index' ? '' :
                 (Route::current()->getName()=='administrator.menu.edit' ? '' : 
                 (Route::current()->getName()=='administrator.menu.create' ? ''  : 'collapsed')) }}" href="{{ route('administrator.menu.index') }}">
                        <i class="bi bi-circle"></i><span>Menus</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-target="#informasi-nav" data-bs-toggle="collapse" href="#" aria-expanded="true">
                <i class="bx bx-user"></i><span>Informasi Company</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="informasi-nav" class="nav-content collapse show" data-bs-parent="#informasi-nav">
                <li>
                    <a class="nav-link {{ Route::current()->getName()=='administrator.profile.index' ? '' :
                 (Route::current()->getName()=='administrator.profile.edit' ? '' : 
                 (Route::current()->getName()=='administrator.profile.create' ? ''  : 'collapsed')) }}" href="{{ route('administrator.profile.index') }}">
                        <i class="bi bi-circle"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::current()->getName()=='administrator.about.index' ? '' :
                 (Route::current()->getName()=='administrator.about.edit' ? '' : 
                 (Route::current()->getName()=='administrator.about.create' ? ''  : 'collapsed')) }}" href="{{ route('administrator.about.index') }}">
                        <i class="bi bi-circle"></i>
                        <span>About</span>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>