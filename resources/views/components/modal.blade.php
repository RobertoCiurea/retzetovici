<button
    type="button"
    class="{{ $openButtonStyles ? $openButtonStyles : "text-sm text-black transition-colors hover:text-gray-800 md:text-base" }}"
    data-open-modal
>
    {{ $openButton }}
</button>
<dialog data-modal class="back items-center rounded-md px-5 py-5 md:px-10">
    <section class="flex w-full flex-col">
        <div class="flex w-full justify-end">
            <button type="button" data-close-modal>
                <!--Close icon-->
                <?xml version="1.0" ?>
                <!DOCTYPE svg PUBLIC '-//W3C//DTD SVG 1.1//EN' 'http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd'>
                <svg
                    class="w-[20px] cursor-pointer fill-gray-500 transition-colors hover:fill-black"
                    id="Layer_1"
                    version="1.1"
                    viewBox="0 0 512 512"
                    xml:space="preserve"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                >
                    <path
                        d="M437.5,386.6L306.9,256l130.6-130.6c14.1-14.1,14.1-36.8,0-50.9c-14.1-14.1-36.8-14.1-50.9,0L256,205.1L125.4,74.5  c-14.1-14.1-36.8-14.1-50.9,0c-14.1,14.1-14.1,36.8,0,50.9L205.1,256L74.5,386.6c-14.1,14.1-14.1,36.8,0,50.9  c14.1,14.1,36.8,14.1,50.9,0L256,306.9l130.6,130.6c14.1,14.1,36.8,14.1,50.9,0C451.5,423.4,451.5,400.6,437.5,386.6z"
                    />
                </svg>
            </button>
        </div>
        {{ $slot }}
    </section>
</dialog>

@push("scripts")
    @vite("resources/js/modal.js")
@endpush
