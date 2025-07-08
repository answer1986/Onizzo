@extends('admin.layout')

@section('title', 'Gestión del Slider')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-play-circle"></i> Gestión del Slider Principal</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-primary btn-sm" onclick="showAddSlideModal()">
                        <i class="fas fa-plus"></i> Agregar Slide
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div id="slider-images" class="row">
                    @foreach($images as $image)
                    <div class="col-md-6 col-lg-4 mb-4 slider-item" data-id="{{ $image->id }}">
                        <div class="card">
                            <div class="card-header p-2 d-flex justify-content-between align-items-center">
                                <span class="badge badge-primary">Orden: {{ $image->slider_order }}</span>
                                <div>
                                    <button class="btn btn-sm btn-info" onclick="editSlide({{ $image->id }})">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-warning" onclick="moveUp({{ $image->id }})">
                                        <i class="fas fa-arrow-up"></i>
                                    </button>
                                    <button class="btn btn-sm btn-warning" onclick="moveDown({{ $image->id }})">
                                        <i class="fas fa-arrow-down"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" onclick="deleteSlide({{ $image->id }})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Imagen principal -->
                            <img src="{{ asset($image->path) }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                            
                            <div class="card-body p-3">
                                <h6 class="card-title">{{ $image->title_es }}</h6>
                                <p class="card-text">{{ Str::limit($image->content_es, 60) }}</p>
                                
                                <!-- Thumbnail preview -->
                                <div class="d-flex align-items-center mt-2">
                                    <span class="badge badge-secondary me-2">Thumbnail:</span>
                                    <img src="{{ asset($image->thumbnail_path) }}" alt="Thumbnail" style="width: 40px; height: 25px; object-fit: cover; border-radius: 3px;">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                @if($images->count() == 0)
                <div class="alert alert-info text-center">
                    <i class="fas fa-info-circle"></i> No hay slides en el slider aún.
                    <br>Haz clic en "Agregar Slide" para comenzar.
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Modal para agregar slide -->
<div class="modal fade" id="addSlideModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-plus me-2"></i>Agregar Slide al Slider</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="addSlideForm" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- Imágenes -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-image me-1"></i>Imagen Principal <span class="text-danger">*</span></label>
                                <input type="file" class="form-control" name="image" accept="image/*" required>
                                <div class="form-text">Imagen de fondo del slide (recomendado: 1200x400px)</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-image me-1"></i>Thumbnail</label>
                                <input type="file" class="form-control" name="thumbnail" accept="image/*">
                                <div class="form-text">Imagen pequeña para navegación (opcional, se usará la principal si no se especifica)</div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Títulos -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-flag me-1"></i>Título (Español) <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="title_es" placeholder="Ej: Productos de Calidad" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-flag me-1"></i>Título (Inglés)</label>
                                <input type="text" class="form-control" name="title_en" placeholder="Ej: Quality Products">
                            </div>
                        </div>
                    </div>
                    
                    <!-- Contenido -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-align-left me-1"></i>Contenido (Español) <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="content_es" rows="3" placeholder="Descripción del slide en español..." required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-align-left me-1"></i>Contenido (Inglés)</label>
                                <textarea class="form-control" name="content_en" rows="3" placeholder="Slide description in English..."></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Texto alternativo -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-info-circle me-1"></i>Texto Alt (Español) <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="alt_text_es" placeholder="Descripción para accesibilidad" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-info-circle me-1"></i>Texto Alt (Inglés)</label>
                                <input type="text" class="form-control" name="alt_text_en" placeholder="Accessibility description">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="saveSlide()">
                    <i class="fas fa-save me-1"></i>Guardar
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para editar slide -->
<div class="modal fade" id="editSlideModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-edit me-2"></i>Editar Slide</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="editSlideForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="editSlideId">
                    
                    <!-- Vista previa actual -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Imagen Actual:</label>
                            <img id="currentImage" src="" class="img-fluid" style="max-height: 150px; border-radius: 5px;">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Thumbnail Actual:</label>
                            <img id="currentThumbnail" src="" class="img-fluid" style="max-height: 150px; border-radius: 5px;">
                        </div>
                    </div>
                    
                    <!-- Resto del formulario igual al de agregar -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-image me-1"></i>Nueva Imagen Principal</label>
                                <input type="file" class="form-control" name="image" accept="image/*">
                                <div class="form-text">Dejar vacío para mantener la actual</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-image me-1"></i>Nuevo Thumbnail</label>
                                <input type="file" class="form-control" name="thumbnail" accept="image/*">
                                <div class="form-text">Dejar vacío para mantener el actual</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-flag me-1"></i>Título (Español) <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="editTitleEs" name="title_es" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-flag me-1"></i>Título (Inglés)</label>
                                <input type="text" class="form-control" id="editTitleEn" name="title_en">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-align-left me-1"></i>Contenido (Español) <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="editContentEs" name="content_es" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-align-left me-1"></i>Contenido (Inglés)</label>
                                <textarea class="form-control" id="editContentEn" name="content_en" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-info-circle me-1"></i>Texto Alt (Español) <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="editAltEs" name="alt_text_es" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label"><i class="fas fa-info-circle me-1"></i>Texto Alt (Inglés)</label>
                                <input type="text" class="form-control" id="editAltEn" name="alt_text_en">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="updateSlide()">
                    <i class="fas fa-save me-1"></i>Actualizar
                </button>
            </div>
        </div>
    </div>
</div>

<script>
// Función para mostrar el modal de agregar slide
function showAddSlideModal() {
    new bootstrap.Modal(document.getElementById('addSlideModal')).show();
}

// Función para guardar nuevo slide
function saveSlide() {
    const formData = new FormData(document.getElementById('addSlideForm'));
    
    fetch('{{ route("admin.slider.store") }}', {
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
            showToast(data.error || 'Error al guardar slide', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showToast('Error al guardar slide', 'error');
    });
}

// Función para editar slide
function editSlide(slideId) {
    // Aquí podrías hacer una petición AJAX para obtener los datos del slide
    // Por simplicidad, vamos a usar los datos ya disponibles
    const slideCard = document.querySelector(`[data-id="${slideId}"]`);
    // Implementar lógica para llenar el modal de edición
    new bootstrap.Modal(document.getElementById('editSlideModal')).show();
}

// Función para actualizar slide
function updateSlide() {
    const slideId = document.getElementById('editSlideId').value;
    const formData = new FormData(document.getElementById('editSlideForm'));
    
    fetch(`{{ route("admin.slider.update", ":id") }}`.replace(':id', slideId), {
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
            showToast(data.error || 'Error al actualizar slide', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showToast('Error al actualizar slide', 'error');
    });
}

// Función para eliminar slide
function deleteSlide(slideId) {
    if (confirm('¿Estás seguro de que quieres eliminar este slide del slider?')) {
        const formData = new FormData();
        formData.append('_token', '{{ csrf_token() }}');
        formData.append('id', slideId);
        
        fetch('{{ route("admin.slider.destroy") }}', {
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
                showToast(data.error || 'Error al eliminar slide', 'error');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showToast('Error al eliminar slide', 'error');
        });
    }
}

// Función para mover slide hacia arriba
function moveUp(slideId) {
    console.log('Move up:', slideId);
    // Implementar lógica de reordenamiento
}

// Función para mover slide hacia abajo
function moveDown(slideId) {
    console.log('Move down:', slideId);
    // Implementar lógica de reordenamiento
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