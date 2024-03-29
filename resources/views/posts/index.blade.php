<x-app-layout>
    <div class="container py-8">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($posts as $post)
                <article class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2 @endif" style="background-image: url(@if($post->image){{Storage::url($post->image->url)}} @else https://cdn.pixabay.com/photo/2022/04/29/17/48/lofoten-7164179__480.jpg @endif)">
                    {{-- <img src="{{Storage::url($post->image->url)}}" alt=""> --}}
                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        <div class="">
                            @foreach($post->tags as $tag)
                                <a href="{{route('posts.tag', $tag)}}" class="inline-block px-3 h-6 bg-{{$tag->color}}-600 text-black rounded-full">{{$tag->name}}</a>
                            @endforeach
                        </div>
                        <h1 class="text-4xl text-black leading-8 font-bold mt-2">
                            <a href="{{route('posts.show', $post)}}">
                                {{$post->name}}
                            </a>
                        </h1>
                    </div>

                </article>
            @endforeach
        </div>

        <div class="mx-4">
            {{$posts->links()}}
        </div>

    </div>
</x-app-layout>