@if (session()->has('success'))
    <div class="fixed top-4 left-1/2 transform -translate-x-1/2 w-full max-w-md z-50 px-4">
        <div class="alert alert-success flex justify-between items-center p-4 mb-6 rounded-lg border bg-green-50 border-green-200 text-green-800">
            <div class="flex items-center">
                <i class="fas fa-check-circle mr-3"></i>
                <span>{{ session('success') }}</span>
            </div>
            <button onclick="this.parentElement.remove()" class="text-green-500 hover:text-green-700">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
@endif

@if (session()->has('error'))
    <div class="fixed top-4 left-1/2 transform -translate-x-1/2 w-full max-w-md z-50 px-4">
        <div class="alert alert-error flex justify-between items-center p-4 mb-6 rounded-lg border bg-red-50 border-red-200 text-red-800">
            <div class="flex items-center">
                <i class="fas fa-exclamation-circle mr-3"></i>
                <span>{{ session('error') }}</span>
            </div>
            <button onclick="this.parentElement.remove()" class="text-red-500 hover:text-red-700">
                <i class="fas fa-times"></i>
            </button>
        </div>
    </div>
@endif

<script>
    // Auto-hide flash messages after 5 seconds
    document.addEventListener('DOMContentLoaded', function() {
        const flashMessages = document.querySelectorAll('.alert');
        flashMessages.forEach(message => {
            setTimeout(() => {
                message.remove();
            }, 5000);
        });
    });
</script>
