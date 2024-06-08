<div>
  <div
    x-data="{
      open: @entangle('showDropdown'),
      search: @entangle('search'),
      selected: @entangle('selected'),
      highlightedIndex: 0,
      highlightPrevious() {
        if (this.highlightedIndex > 0) {
          this.highlightedIndex = this.highlightedIndex - 1;
          this.scrollIntoView();
        }
      },
      highlightNext() {
        if (this.highlightedIndex < this.$refs.results.children.length - 1) {
          this.highlightedIndex = this.highlightedIndex + 1;
          this.scrollIntoView();
        }
      },
      scrollIntoView() {
        this.$refs.results.children[this.highlightedIndex].scrollIntoView({
          block: 'nearest',
          behavior: 'smooth'
        });
      },
      updateSelected(id, name) {
        this.selected = id;
        this.search = '('+ id +') ' + name;
        this.open = false;
        this.highlightedIndex = 0;
      },
  }">
  <div
    x-on:value-selected="updateSelected($event.detail.id, $event.detail.name)">
    <span>
      <div>
        <input class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter"
          wire:model.live.debounce.300ms="search"
          wire:change="sendValue"
          x-on:keydown.arrow-down.stop.prevent="highlightNext()"
          x-on:keydown.arrow-up.stop.prevent="highlightPrevious()"
          x-on:keydown.enter.stop.prevent="$dispatch('value-selected', {
            id: $refs.results.children[highlightedIndex].getAttribute('data-result-id'),
            name: $refs.results.children[highlightedIndex].getAttribute('data-result-name')
          })">
      </div>
    </span>

    <div
      class="rounded border-[1.5px] border-stroke"
      x-show="open"
      x-on:click.away="open = false">
        <ul x-ref="results">
          @forelse($results as $index => $result)
            <li 
              class="py-1 px-5"
              wire:key="{{ $index }}"
              x-on:click.stop="$dispatch('value-selected', {
                id: {{ $result->id }},
                name: '{{ $result->name }}'
              })"
              :class="{
                'bg-indigo-400': {{ $index }} === highlightedIndex,
                'text-white': {{ $index }} === highlightedIndex
              }"
              data-result-id="{{ $result->id }}"
              data-result-name="{{ $result->name }}">
                <span>
                  {{ $result->name }}
                </span>
            </li>
          @empty
            <li>No results found</li>
          @endforelse
        </ul>
      </div>
    </div>
  </div>
</div>
