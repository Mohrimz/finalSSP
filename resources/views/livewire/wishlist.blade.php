<div>
    <button wire:click="toggleWishlist">
        <i class="fa fa-heart {{ $isInWishlist ? 'text-red-500' : 'text-gray-400' }} transition duration-300"></i>
    </button>
</div>
