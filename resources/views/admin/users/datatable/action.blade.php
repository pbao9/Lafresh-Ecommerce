<div class="d-flex align-items-center gap-2 justify-content-center">
    <x-link :href="route('admin.user.edit', $id)" class="btn btn-cyan btn-icon">
        <i class="ti ti-pencil"></i>
    </x-link>
    <x-button.modal-delete class="btn-icon" data-route="{{ route('admin.user.delete', $id) }}">
        <i class="ti ti-trash"></i>
    </x-button.modal-delete>
</div>
