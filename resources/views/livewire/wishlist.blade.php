<div>
    <button wire:click="toggleWishlist">
        <i class="fa fa-heart text-2xl {{ $isInWishlist ? 'text-red-500' : 'text-gray-400' }} hover:text-red-500 transition duration-300"></i>
    </button>
</div>
