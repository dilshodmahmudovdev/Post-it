<div class="my-shadow rounded-3 bg-white p-3 pt-2 mb-3">
    <div class="d-flex justify-content-between">
        <a href="{{ route('posts.create') }}" class="d-flex align-items-center text-decoration-none">
            <div class="profile-image text-secondary fs-2 rounded-5">
                <i class="bi bi-person-circle"></i>
            </div>
            <div class="mx-2">
                <small class="text-secondary d-block">{{ $post->user->full_name }}</small>
                <small class="text-secondary d-block">{{ $post->user->email }}</small>
            </div>
        </a>
        <div class="mt-1">
            <x-timeAgo :timestamp="$post->time_ago"/>
        </div>
    </div>

    <div class="border-top mt-2 mb-3"></div>

    <a href="{{ asset('storage/' . $post->img_url) }}" target="_blank" class="card-image-on">
        <img src="{{ asset('storage/' . $post->img_url) }}" alt="">
    </a>

    <div class="border-top border-secondary mt-3"></div>

    <p class="fw-semibold mt-2 mx-2">
        {{ $post->title }}
    </p>

    <div class="border-top border-secondary"></div>

    <div class="bg-light border px-2 pt-2 pb-3 rounded-2 text-dark mt-3 mb-2">
        <p class="home-post-body">{{ $post->body }}</p>
        <div class="my-border-top"></div>
        <div class="text-center mt-1">
            <a href="{{ route('posts.show', $post->id) }}" class="text-muted">Batafsil...</a>
        </div>
    </div>

    <div class="d-flex align-items-center mt-3">
        <form action="{{ route('posts.like', $post) }}" method="POST" class="d-inline-block">
            @csrf
            <button type="submit" class="like-btn">
                <i class="bi bi-heart"></i>
                <small class="mx-1">
                    @if(!$post->likes || $post->likes->count() === 0)
                        ...
                    @else
                        {{ $post->likes->count() }}
                    @endif
                </small>
            </button>
        </form>

        <a href="{{ route('posts.comments.index', $post->id) }}" target="_blank" class="comments-btn">
            <i class="bi bi-chat"></i>
            <small class="mx-1">
                @if(!$post->comments || count($post->comments) === 0)
                    ...
                @else
                    {{ count($post->comments) }}
                @endif
            </small>
        </a>
    </div>
</div>
