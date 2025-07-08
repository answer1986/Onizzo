@extends('admin.layout')

@section('title', 'Gestión del Carrusel')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-images"></i> Gestión del Carrusel</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-primary btn-sm" onclick="showAddImageModal()">
                        <i class="fas fa-plus"></i> Agregar Imagen
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div id="carousel-images" class="row">
                    @foreach($images as $image)
                    <div class="col-md-3 mb-4 carousel-item" data-id="{{ $image->id }}">
                        <div class="card">
                            <div class="card-header p-2 d-flex justify-content-between align-items-center">
                                <span class="badge badge-primary">Orden: {{ $image->carousel_order }}</span>
                                <div>
                                    <button class="btn btn-sm btn-warning" onclick="moveUp({{ $image->id }})">
                                        <i class="fas fa-arrow-up"></i>
                                    </button>
                                    <button class="btn btn-sm btn-warning" onclick="moveDown({{ $image->id }})">
                                        <i class="fas fa-arrow-down"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" onclick="deleteImage({{ $image->id }})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                            <img src="{{ asset($image->path) }}" class="card-img-top" style="height: 150px; object-fit: cover;">
                            <div class="card-body p-2">
                                <h6 class="card-title">{{ $image->alt_text_es }}</h6>
                                <small class="text-muted">{{ $image->description }}</small>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                @if($images->count() == 0)
                <div class="alert alert-info text-center">
                    <i class="fas fa-info-circle"></i> No hay imágenes en el carrusel aún.
                    <br>Haz clic en "Agregar Imagen" para comenzar.
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Modal para agregar imagen -->
<div class="modal fade" id="addImageModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-plus me-2"></i>Agregar Imagen al Carrusel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="addImageForm" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-image me-1"></i>Seleccionar Imagen</label>
                        <input type="file" class="form-control" name="image" accept="image/*" required>
                        <div class="form-text">Formatos: JPG, PNG, GIF, SVG, WebP (máx. 2MB)</div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-flag me-1"></i>Descripción (Español)</label>
                        <input type="text" class="form-control" name="alt_text_es" placeholder="Ej: Frutas secas" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-flag me-1"></i>Descripción (Inglés)</label>
                        <input type="text" class="form-control" name="alt_text_en" placeholder="Ej: Dried fruits">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-info-circle me-1"></i>Descripción adicional</label>
                        <textarea class="form-control" name="description" rows="2" placeholder="Descripción opcional"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="saveImage()">
                    <i class="fas fa-save me-1"></i>Guardar
                </button>
            </div>
        </div>
    </div>
</div>

<script>
// Función para mostrar el modal de agregar imagen
function showAddImageModal() {
    new bootstrap.Modal(document.getElementById('addImageModal')).show();
}

// Función para guardar nueva imagen
function saveImage() {
    const formData = new FormData(document.getElementById('addImageForm'));
    
    fetch('{{ route("admin.carousel.store") }}', {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            showToast(data.message, 'success');
            setTimeout(() => {
                location.reload();
            }, 1500);
        } else {
            showToast(data.error || 'Error al guardar imagen', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showToast('Error al guardar imagen', 'error');
    });
}

// Función para eliminar imagen
function deleteImage(imageId) {
    if (confirm('¿Estás seguro de que quieres eliminar esta imagen del carrusel?')) {
        const formData = new FormData();
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('id', imageId);
        
        fetch('{{ route("admin.carousel.destroy") }}', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showToast(data.message, 'success');
                setTimeout(() => {
                    location.reload();
                }, 1500);
            } else {
                showToast(data.error || 'Error al eliminar imagen', 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showToast('Error al eliminar imagen', 'error');
        });
    }
}

// Función para mover imagen hacia arriba
function moveUp(imageId) {
    // Implementar lógica de reordenamiento
    console.log('Move up:', imageId);
}

// Función para mover imagen hacia abajo
function moveDown(imageId) {
    // Implementar lógica de reordenamiento
    console.log('Move down:', imageId);
}

// Función para mostrar toast
function showToast(message, type) {
    const toastHtml = `
        <div class="toast align-items-center text-white bg-${type === 'success' ? 'success' : 'danger'} border-0" role="alert">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="fas fa-${type === 'success' ? 'check' : 'exclamation-triangle'} me-2"></i>
                    ${message}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    `;
    
    let toastContainer = document.getElementById('toast-container');
    if (!toastContainer) {
        toastContainer = document.createElement('div');
        toastContainer.id = 'toast-container';
        toastContainer.className = 'toast-container position-fixed top-0 end-0 p-3';
        toastContainer.style.zIndex = '10000';
        document.body.appendChild(toastContainer);
    }
    
    toastContainer.insertAdjacentHTML('beforeend', toastHtml);
    const toastElement = toastContainer.lastElementChild;
    new bootstrap.Toast(toastElement).show();
    
    toastElement.addEventListener('hidden.bs.toast', () => {
        toastElement.remove();
    });
}
</script>
@endsection 