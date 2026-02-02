@props(['productId'])
<div>
    <!-- DELETE -->
    <form action="{{ route('products.destroy', $productId) }}"
        method="POST"
        class="inline"
        onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
        @csrf
        @method('DELETE')
        <button type="button"
            onclick="openDeleteModal({{ $productId }})"
            class="px-3 py-1 text-xs font-medium text-white bg-red-600 rounded hover:bg-red-700">
            Delete
        </button>
    </form><!-- Simplicity is an acquired taste. - Katharine Gerould -->
</div>