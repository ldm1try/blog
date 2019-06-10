<div class="list-group mb-2">
    <a class="list-group-item list-group-item-action {{--{{ Request::is('admin/blog/posts') ? 'active' : '' }}--}}"
        href="{{ route('admin.blog.posts.index') }}"
    >
        Статьи
    </a>
    <a class="list-group-item list-group-item-action {{--{{ Request::is('admin/blog/categories') ? 'active' : '' }}--}}"
        href="{{ route('admin.blog.categories.index') }}"
    >
        Категории
    </a>
</div>