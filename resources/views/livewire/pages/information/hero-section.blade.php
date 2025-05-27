<div class="flex flex-col gap-5 md:flex-row">
    <div class="flex-1">
        <div class="w-full shadow card rounded-xl bg-base-100 h-full image-full aspect-[5/3] md:aspect-[5/4]">
            <figure>
                <img
                src="{{ asset($news->first()->media->first()->url) }}"
                class="object-cover w-full"
                alt="berita" />
            </figure>
            <div class="card-body">
                <h2 class="text-2xl card-title line-clamp-3">{{ $news->first()->title }}</h2>
                <p>Update {{ $news->first()->updated_at->format('d m Y') }}</p>
                <div class="justify-end card-actions">
                <x-mary-button class="btn-info btn-sm" label="Baca Selengkapnya" :link="route('information.news-content', ['type' => 'news', 'slug' => $news->first()->slug])"/>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-col flex-1 gap-5">
        <div class="flex-1 hidden md:block">
            <div class="w-full shadow h-full card rounded-xl bg-base-100 image-full aspect-[2/1]">
                <figure>
                    <img
                    src="{{ asset($news->last()->media->first()->url) }}"
                    class="object-cover w-full"
                    alt="berita1" />
                </figure>
                <div class="card-body">
                    <h2 class="text-xl card-title line-clamp-3">{{ $news->last()->title }}</h2>
                    <p>Update {{ $news->last()->updated_at->format('d m Y') }}</p>
                    <div class="justify-end card-actions">
                    <x-mary-button class="btn-info btn-sm" label="Baca Selengkapnya" :link="route('information.news-content', ['type' => 'news', 'slug' => $news->last()->slug])"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-1 gap-5">
            <div class="flex-1">
                <div class="w-full shadow card rounded-xl bg-base-100 image-full aspect-[5/3]">
                    <figure>
                        <img
                            src="{{ asset($reports->first()->media->first()->url) }}"
                            class="object-cover w-full"
                            alt="berita1" />
                    </figure>
                    <div class="card-body">
                        <h2 class="text-xl card-title line-clamp-1">{{ $reports->first()->title }}</h2>
                        <p>Update {{ $reports->first()->updated_at->format('d m Y') }}</p>
                        <div class="justify-end card-actions">
                            <x-mary-button class="btn-info btn-sm" label="Baca Selengkapnya" :link="route('information.news-content', ['type' => 'news', 'slug' => $news->last()->slug])"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-1">
                <div class="w-full shadow card rounded-xl bg-base-100 image-full aspect-[5/3]">
                    <figure>
                        <img
                            src="{{ asset($reports->last()->media->first()->url) }}"
                            class="object-cover w-full"
                            alt="berita1" />
                    </figure>
                    <div class="card-body">
                        <h2 class="text-xl card-title line-clamp-1">{{ $reports->last()->title }}</h2>
                        <p>Update {{ $reports->last()->updated_at->format('d m Y') }}</p>
                        <div class="justify-end card-actions">
                            <x-mary-button class="btn-info btn-sm" label="Baca Selengkapnya" :link="route('information.news-content', ['type' => 'news', 'slug' => $news->last()->slug])"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>