<div class="flex flex-col gap-9">
    <div class="rounded-sm border border-stroke bg-white shadow-default" >
        <div class="border-b border-stroke px-6.5 py-4 " >
            <h3 class="font-medium text-black ">
                {{ $title }}
            </h3>
        </div>
        
        {{ $slot }}
        
    </div>
</div>