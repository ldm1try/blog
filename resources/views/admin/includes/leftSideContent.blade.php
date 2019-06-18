<div class="list-group mb-2">
    <a class="list-group-item list-group-item-action
       {{ Request::is('admin/blog/posts', 'admin/blog/posts/*') ? 'active' : '' }}"
       href="{{ route('admin.blog.posts.index') }}"
    >
        Статьи
    </a>
    <a class="list-group-item list-group-item-action
        {{ Request::is('admin/blog/categories', 'admin/blog/categories/*') ? 'active' : '' }}"
        href="{{ route('admin.blog.categories.index') }}"
    >
        Категории
    </a>

    <a class="list-group-item list-group-item-action my-3
       {{ Request::is('admin/users', 'admin/users/*') ? 'active' : '' }}"
       href="{{ route('admin.users.index') }}"
    >
        Пользователи
    </a>
</div>