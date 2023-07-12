<div class="relative">
  <button
    type="button"
    class="w-11 h-11 search-form-trigger"      
  >
    <i class="fas fa-search"></i>
  </button>

  <div
    class="search-form-overlay z-50 hidden bg-[rgba(0,0,0,0.9)] fixed right-0 top-0 bottom-0 left-0"
  >
    <button
      type="button"
      class="absolute top-4 right-4 text-white w-10 h-10 search-form-close-btn"
    >
      <i class="fas fa-times fa-lg"></i>
    </button>

    <div class="absolute top-1/2 -translate-y-1/2 w-full">
      <form
        class="
          mx-auto px-4 text-right flex
          max-w-screen-sm w-full
        "
        action="/"
        method="GET"
      >
        <input
          name="s"
          type="text"
          placeholder="Cari artikel..."
          class="min-w-0 focus:outline-none bg-transparent text-white border-b text-xl flex-1"
        >
        <button
          type="submit"
          class="ml-4 w-10 h-10 text-white"
        >
          <i class="fas fa-search fa-lg"></i>
        </button>
      </form>
    </div>
  </div>
</div>