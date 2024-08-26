<x-filament-panels::page>
    <form wire:submit.prevent="saveSettings" class="space-y-6">
        {{ $this->form }}

        <div class="text-left">
            <x-filament::button type="submit" wire:loading.attr="disabled">
                Save Settings
                <div wire:loading class="spinner-container">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </x-filament::button>

        </div>
    </form>
    <style>
        .btn-with-spinner {
            display: flex;
            align-items: center;
            font-size: 1rem;
            /* Adjust font size if needed */
            position: relative;
            padding: 0.5rem 1rem;
            /* Adjust padding to suit your design */
        }

        .spinner-container {
            margin-left: 0.5rem;
            /* Space between text and spinner */
            display: flex;
            align-items: center;
        }

        .spinner-border {
            width: 1rem;
            /* Smaller size */
            height: 1rem;
            /* Smaller size */
            border: 0.15em solid rgba(0, 0, 0, 0.1);
            /* Adjust border thickness */
            border-radius: 50%;
            border-top: 0.15em solid #007bff;
            /* Spinner color */
            animation: spinner-border .75s linear infinite;
        }

        @keyframes spinner-border {
            to {
                transform: rotate(360deg);
            }
        }
    </style>
</x-filament-panels::page>
<!-- Add styles for spinner -->
