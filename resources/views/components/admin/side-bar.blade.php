<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <a class="brand-link">
            <img src="/assets/back/dist/img/AdminLTELogo.png" alt="Admin Panel" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Admin Panel</span>
            </a>
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                      Portfolio
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a  href="{{ route('admin.projects.index') }}" class="nav-link">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>
                              Projects
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a  href="{{ route('admin.roles.index') }}" class="nav-link">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>
                                Project roles
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a  href="{{ route('admin.project-categories.index') }}" class="nav-link">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>
                                Project categories
                            </p>
                        </a>
                    </li>
                  </ul>
                </li>


                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                      Blogs
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item ">
                      <a  href="{{ route('admin.blogs.index') }}" class="nav-link">
                          <i class="nav-icon far fa-calendar-alt"></i>
                          <p>
                              Blog
                          </p>
                      </a>
                    </li>
                    <li class="nav-item ">
                        <a  href="{{ route('admin.blog-categories.index') }}" class="nav-link">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>
                                Blog categories
                            </p>
                        </a>
                    </li>
                  </ul>
                </li>


                <li class="nav-item ">
                    <a  href="{{ route('admin.about-slides.index') }}" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Home header slides
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a  href="{{ route('admin.cards.index') }}" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Cards
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-table"></i>
                    <p>
                      Services
                      <i class="fas fa-angle-left right"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item ">
                        <a  href="{{ route('admin.services.index') }}" class="nav-link">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>
                                Services
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a  href="{{ route('admin.service-accordions.index') }}" class="nav-link">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>
                                Services' accordions
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a  href="{{ route('admin.service-letters.index') }}" class="nav-link">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>
                              Services' letters
                            </p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a  href="{{ route('admin.subservices.index') }}" class="nav-link">
                            <i class="nav-icon far fa-calendar-alt"></i>
                            <p>
                                Subservices
                            </p>
                        </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item ">
                    <a  href="{{ route('admin.company-icons.index') }}" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Companies' icons
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a  href="{{ route('admin.letters.index') }}" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                          Letters
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a  href="{{ route('admin.team-members.index') }}" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                          Team members
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a  href="{{ route('admin.contact.edit') }}" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                          Contacts
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a  href="{{ route('admin.language-lines.index') }}" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                          Translation
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a  href="{{ route('admin.about-us-content.edit') }}" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                          About us content
                        </p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a  href="{{ route('admin.admins.index') }}" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                          Admins
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>