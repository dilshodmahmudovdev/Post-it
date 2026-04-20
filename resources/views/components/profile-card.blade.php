<div class="col-xl-6 px-1 mt-2">
    <div class="rounded-3 my-border my-shadow">

        <div class="p-2">

            <div class="post-img-on">
                <img src="{{ asset('storage/' . $post->img_url) }}" alt="" class="post-img">
            </div>

            <div class="my-border-top mb-1 mt-2"></div>
            <h6 class="post-title">{{ $post->title }}</h6>
            <div class="my-border-top mb-2"></div>

            <p class="post-body mb-2">{{ $post->body }}</p>
            <div class="text-center">
                <a href="{{ route('posts.show', $post->id) }}" class="">
                    Batafsil Ko'zdan kechirish
                </a>
            </div>

        </div>
    </div>
</div>
