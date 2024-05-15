<nav class="bg-white border-gray-200 dark:bg-gray-900">
    @php
        $route = Route::currentRouteName();
    @endphp

    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="{{ route('homepage') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"><s>Symfony</s> Laravel Demo</span>
        </a>
        <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                <li class="flex text-{{ $route == 'blog.index' ? 'blue-500' : 'white' }} md:text-{{ $route == 'blog.index' ? 'blue-500' : 'white' }} dark:text-{{ $route == 'blog.index' ? 'blue-500' : 'white' }}">
                    <i class="fa fa-home"></i>
                    <a href="{{ route('blog.index') }}" class="block py-2 px-3 bg-blue-700 rounded md:bg-transparent md:p-0">Home</a>
                </li>
                <li class="flex text-{{ $route == 'blog.search' ? 'blue-500' : 'white' }} md:text-{{ $route == 'blog.search' ? 'blue-500' : 'white' }} dark:text-{{ $route == 'blog.search' ? 'blue-500' : 'white' }}">
                    <i class="fa fa-search"></i>
                    <a href="{{ route('blog.search') }}" class="block py-2 px-3 bg-blue-700 rounded md:bg-transparent md:p-0">Home</a>
                </li>

                @if(Auth::check())
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" id="user">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span class="caret"></span>
                            <span class="sr-only">{{ Auth::user()->fullname }}</span>
                        </a>
                        <div class="dropdown-menu user" role="menu" aria-labelledby="user">
                            {{--                                        <a class="dropdown-item" href="{{ route('user_edit') }}">--}}
                            {{--                                            <i class="fa fa-edit" aria-hidden="true"></i> {{ 'menu.user' }}--}}
                            {{--                                        </a>--}}
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}">
                                <i class="fa fa-sign-out" aria-hidden="true"></i> {{ 'menu.logout' }}
                            </a>
                        </div>
                    </li>
                @endif

                {{--                        TODO: C'est un macro en Sf, donc Components ici--}}
                {{--                        <li class="nav-item dropdown">--}}
                {{--                            {% from 'default/_language_selector.html.twig' import render_language_selector %}--}}
                {{--                            {{ render_language_selector() }}--}}
                {{--                        </li>--}}
            </ul>
        </div>
    </div>
</nav>
{{--                            TODO --}}
{{--                            {% if is_granted('ROLE_ADMIN') %}--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="{{ path('admin_post_index') }}">--}}
{{--                                    <i class="fa fa-lock" aria-hidden="true"></i> {{ 'menu.admin'|trans }}--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            {% endif %}--}}
{{--                        {% endblock %}--}}

