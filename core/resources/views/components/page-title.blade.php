    <!-- Breadcrumb Start -->
    <div class="pt-1.5 pb-8 lg:px-1.5 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between" >
        <h2 class="text-title-lg font-bold text-black">
            {{ $title }}
        </h2>

        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="font-medium" href="index.html">Dashboard /</a>
                </li>
                <li class="font-medium text-primary">{{ $title }}</li>
            </ol>
        </nav>
    </div>
    <!-- Breadcrumb End -->