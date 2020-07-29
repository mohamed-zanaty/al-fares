<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            {{--Main --}}
            <li class="nav-item {{request()->segment(3) == '' && request()->segment(2) == 'admin'? 'active' : ''  }}"><a href="{{route('admin.dashboard')}}"><i
                        class="la la-bar-chart-o"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main">{{__('site.main')}} </span></a>
            </li>

            {{-- Categories  --}}
            @if (auth('admin')->user()->hasPermission('categories_read'))

                {{-- Category --}}
                <li class="nav-item {{request()->segment(3) == 'category' ? 'active' : ''}}"><a href=""><i
                            class="icon icon-grid"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">{{__('site.categories')}}  </span>
                        <span
                            class="badge badge badge-success badge-pill float-right mr-2">{{App\Models\Category::count()}}</span>
                    </a>
                    <ul class="menu-content">
                        <li class="{{request()->segment(3) == 'category' && request()->segment(4) == '' ? 'active' : ''}}">
                            <a class="menu-item" href="{{route('category.index')}}"
                               data-i18n="nav.dash.ecommerce"> {{__('site.show')}} {{__('site.categories')}} </a>
                        </li>
                        @if (auth('admin')->user()->hasPermission('categories_create'))
                            <li class="{{request()->segment(3) == 'category' && request()->segment(4) == 'create' ? 'active' : ''}}">
                                <a class="menu-item" href="{{route('category.create')}}"
                                   data-i18n="nav.dash.crypto">{{__('site.add')}} {{__('site.category')}} </a>
                            </li>
                        @endif
                    </ul>
                </li>

            @endif





            {{-- Blog --}}
            @if (auth('admin')->user()->hasPermission('blog_read'))
                <li class="nav-item {{request()->segment(3) == 'blog' || request()->segment(4) == 'blog.get' ? 'active' : ''}}">
                    <a href=""><i class="la la-pencil"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">{{__('site.works')}}  </span>
                        <span
                            class="badge badge badge-success badge-pill float-right mr-2">{{App\Models\Blog::count()}}</span>
                    </a>
                    <ul class="menu-content">
                        <li class="{{request()->segment(3) == 'blog' && request()->segment(4) == '' ? 'active' : ''}}">
                            <a
                                class="menu-item" href="{{route('blog.index')}}"
                                data-i18n="nav.dash.ecommerce"> {{__('site.show')}} </a>
                        </li>

                        @if (auth('admin')->user()->hasPermission('blog_create'))
                            <li class="{{request()->segment(3) == 'blog' && request()->segment(4) == 'create' ? 'active' : ''}}">
                                <a class="menu-item " href="{{route('blog.create')}}" data-i18n="nav.dash.crypto">
                                    {{__('site.add')}} </a>
                            </li>

                            <li class="{{request()->segment(3) == 'blog.get'  ? 'active' : ''}}"><a class="menu-item"
                                                                                                    href="{{route('blog.get')}}"
                                                                                                    data-i18n="nav.dash.crypto">
                                    {{__('site.pending')}}  </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            {{-- contact --}}
            @if (auth('admin')->user()->hasPermission('blog_read'))
                <li class="nav-item {{request()->segment(2) == 'contact' ? 'active' : ''}}"><a href="{{route('contact.index')}}"><i
                            class="icon-action-redo success"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">{{__('site.contact')}}  </span>
                        <span
                            class="badge badge badge-success badge-pill float-right mr-2">{{App\Models\Contact::count()}}</span>
                    </a>
                </li>
            @endif



            {{-- moderator --}}
            @if (auth('admin')->user()->hasPermission('users_read'))

                <li class="nav-item {{request()->segment(3) == 'moderator'  ? 'active' : ''}}"><a href=""><i
                            class="la la-user-secret"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">{{__('site.moderator')}}  </span>
                        <span
                            class="badge badge badge-success badge-pill float-right mr-2">{{App\Models\Admin::whereRoleIs('admin')->count()}}</span>
                    </a>
                    <ul class="menu-content">
                        <li class="{{request()->segment(3) == 'moderator' && request()->segment(4) == '' ? 'active' : ''}}">
                            <a class="menu-item" href="{{route('moderator.index')}}"
                               data-i18n="nav.dash.ecommerce">{{__('site.show')}} </a>
                        </li>
                        @if (auth('admin')->user()->hasPermission('users_create'))

                            <li class="{{request()->segment(3) == 'moderator' && request()->segment(4) == 'create' ? 'active' : ''}}">
                                <a class="menu-item" href="{{route('moderator.create')}}" data-i18n="nav.dash.crypto">
                                    {{__('site.add')}} </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            {{-- setting --}}
            @if (auth('admin')->user()->hasPermission('settings_read'))
                <li class="nav-item {{request()->segment(3) == 'setting' ? 'active' : ''}}"><a href="{{route('setting.index')}}"><i
                            class="la la-cogs"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">{{__('site.setting')}}  </span>
                    </a>
                </li>
            @endif


        </ul>
    </div>
</div>
