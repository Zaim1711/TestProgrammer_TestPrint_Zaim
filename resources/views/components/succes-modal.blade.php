<div id="succesModal" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
    <div class="bg-white rounded-lg p-6 w-96 text-center">
        <h2 class="text-lg font-semibold mb-4 text-green-600">✅ Berhasil!</h2>
        <p class="mb-4 text-gray-600">{{ session('success') }}</p>
        <button onclick="document.getElementById('succesModal').classList.add('hidden')"
            class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
            OK
        </button>
    </div>
</div>

@push('scripts')
@if(session('success'))
<script>
    document.getElementById('succesModal').classList.remove('hidden');
</script>
@endif
@endpush
