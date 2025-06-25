@if(session('admin_authenticated'))
<!-- Inline Editor Styles -->
<style>
.edit-icon {
    transition: all 0.3s ease;
}

.edit-icon:hover {
    opacity: 1 !important;
    transform: scale(1.2);
}

.inline-editor-bar {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    background: linear-gradient(135deg, #007bff, #0056b3);
    color: white;
    padding: 10px 20px;
    z-index: 9999;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.inline-editor-bar .container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.inline-editor-bar h5 {
    margin: 0;
    font-size: 14px;
}

.inline-editor-bar .btn {
    font-size: 12px;
    padding: 5px 15px;
}

body {
    padding-top: 60px;
}

/* Modal styles */
.modal-content {
    border-radius: 10px;
}

.modal-header {
    background: linear-gradient(135deg, #007bff, #0056b3);
    color: white;
    border-radius: 10px 10px 0 0;
}

.btn-primary {
    background: linear-gradient(135deg, #007bff, #0056b3);
    border: none;
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}
</style>

<!-- Inline Editor Bar -->
<div class="inline-editor-bar">
    <div class="container">
        <div>
            <h5><i class="fas fa-edit me-2"></i>Modo Edición Activado</h5>
            <small>Haz clic en los lapicitos para editar contenido</small>
        </div>
        <div>
            <form action="{{ route('admin.logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-light btn-sm">
                    <i class="fas fa-sign-out-alt me-1"></i>Salir del Modo Edición
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Text Edit Modal -->
<div class="modal fade" id="textEditModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-edit me-2"></i>Editar Texto</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="textEditForm">
                    <input type="hidden" id="textKey">
                    <input type="hidden" id="textSection">
                    <input type="hidden" id="textType">
                    
                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-flag me-1"></i>Texto en Español</label>
                        <textarea class="form-control" id="textValueEs" rows="3"></textarea>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-flag me-1"></i>Texto en Inglés</label>
                        <textarea class="form-control" id="textValueEn" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="saveText()">
                    <i class="fas fa-save me-1"></i>Guardar
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Image Edit Modal -->
<div class="modal fade" id="imageEditModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-image me-2"></i>Cambiar Imagen</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="imageEditForm" enctype="multipart/form-data">
                    <input type="hidden" id="imageKey">
                    <input type="hidden" id="imageSection">
                    
                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-upload me-1"></i>Nueva Imagen</label>
                        <input type="file" class="form-control" id="imageFile" accept="image/*" required>
                        <div class="form-text">Formatos soportados: JPG, PNG, GIF, SVG, WebP (máx. 2MB)</div>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-flag me-1"></i>Texto alternativo (Español)</label>
                        <input type="text" class="form-control" id="altTextEs">
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label"><i class="fas fa-flag me-1"></i>Texto alternativo (Inglés)</label>
                        <input type="text" class="form-control" id="altTextEn">
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

<!-- Bootstrap (if not already included) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Font Awesome (if not already included) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- Inline Editor JavaScript -->
<script>
let currentElement = null;

function editContent(key, section, type, element) {
    currentElement = element.parentElement;
    
    document.getElementById('textKey').value = key;
    document.getElementById('textSection').value = section;
    document.getElementById('textType').value = type;
    
    // Obtener texto actual
    const currentText = currentElement.childNodes[0].textContent.trim();
    document.getElementById('textValueEs').value = currentText;
    document.getElementById('textValueEn').value = '';
    
    // Cambiar textarea/input según el tipo
    const textValueEs = document.getElementById('textValueEs');
    const textValueEn = document.getElementById('textValueEn');
    
    if (type === 'textarea' || type === 'html') {
        textValueEs.rows = 5;
        textValueEn.rows = 5;
    } else {
        textValueEs.rows = 2;
        textValueEn.rows = 2;
    }
    
    new bootstrap.Modal(document.getElementById('textEditModal')).show();
}

function editImage(key, section) {
    document.getElementById('imageKey').value = key;
    document.getElementById('imageSection').value = section;
    
    new bootstrap.Modal(document.getElementById('imageEditModal')).show();
}

function deleteImage(key, section) {
    console.log('=== INICIO deleteImage FRONTEND ===');
    console.log('Key:', key);
    console.log('Section:', section);
    
    // Verificar si existe el meta tag CSRF
    const csrfToken = document.querySelector('meta[name="csrf-token"]');
    if (!csrfToken) {
        console.error('ERROR: No se encontró meta tag csrf-token');
        alert('Error: Token CSRF no encontrado en la página');
        return;
    }
    
    const token = csrfToken.getAttribute('content');
    console.log('CSRF Token encontrado:', token);
    
    if (confirm('¿Estás seguro de que quieres restaurar la imagen original? Esto eliminará la imagen personalizada.')) {
        console.log('Usuario confirmó eliminación');
        
        const formData = new FormData();
        formData.append('_token', token);
        formData.append('key', key);
        formData.append('section', section);

        console.log('FormData preparado:', {
            key: key,
            section: section,
            token: token ? token.substring(0, 10) + '...' : 'null'
        });

        const url = '{{ route("api.image.delete") }}';
        console.log('URL destino:', url);

        fetch(url, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            console.log('=== RESPUESTA RECIBIDA ===');
            console.log('Status:', response.status);
            console.log('Status Text:', response.statusText);
            console.log('Headers:', response.headers);
            console.log('OK:', response.ok);
            
            // Intentar leer como texto primero para debug
            return response.text().then(text => {
                console.log('Response text:', text);
                
                if (!response.ok) {
                    throw new Error(`HTTP ${response.status}: ${response.statusText} - ${text}`);
                }
                
                try {
                    return JSON.parse(text);
                } catch (e) {
                    throw new Error('Response is not valid JSON: ' + text);
                }
            });
        })
        .then(data => {
            console.log('=== DATOS PARSEADOS ===');
            console.log('Response data:', data);
            
            if (data.success) {
                console.log('Éxito! Mensaje:', data.message);
                showToast(data.message, 'success');
                // Recargar la página para mostrar la imagen original
                setTimeout(() => {
                    console.log('Recargando página...');
                    location.reload();
                }, 1500);
            } else {
                console.error('Error en respuesta exitosa:', data);
                showToast(data.error || 'Error al restaurar la imagen', 'error');
            }
        })
        .catch(error => {
            console.error('=== ERROR COMPLETO ===');
            console.error('Error:', error);
            console.error('Stack:', error.stack);
            showToast('Error: ' + error.message, 'error');
        });
    } else {
        console.log('Usuario canceló eliminación');
    }
}

function saveText() {
    const formData = new FormData();
    formData.append('_token', '{{ csrf_token() }}');
    formData.append('key', document.getElementById('textKey').value);
    formData.append('section', document.getElementById('textSection').value);
    formData.append('value_es', document.getElementById('textValueEs').value);
    formData.append('value_en', document.getElementById('textValueEn').value);
    
    fetch('{{ route("api.content.update") }}', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Actualizar el texto en la página
            if (currentElement) {
                const newText = document.getElementById('textValueEs').value || document.getElementById('textValueEn').value;
                currentElement.childNodes[0].textContent = newText;
            }
            
            bootstrap.Modal.getInstance(document.getElementById('textEditModal')).hide();
            showToast('Texto actualizado correctamente', 'success');
        } else {
            showToast('Error al actualizar el texto', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showToast('Error al actualizar el texto', 'error');
    });
}

function saveImage() {
    const formData = new FormData();
    formData.append('_token', '{{ csrf_token() }}');
    formData.append('key', document.getElementById('imageKey').value);
    formData.append('section', document.getElementById('imageSection').value);
    formData.append('image', document.getElementById('imageFile').files[0]);
    formData.append('alt_text_es', document.getElementById('altTextEs').value);
    formData.append('alt_text_en', document.getElementById('altTextEn').value);
    
    fetch('{{ route("api.image.update") }}', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Actualizar la imagen en la página
            const imgElement = document.getElementById('img-' + document.getElementById('imageKey').value);
            if (imgElement) {
                imgElement.src = data.new_path;
            }
            
            bootstrap.Modal.getInstance(document.getElementById('imageEditModal')).hide();
            showToast('Imagen actualizada correctamente', 'success');
            
            // Limpiar formulario
            document.getElementById('imageEditForm').reset();
        } else {
            showToast('Error al actualizar la imagen', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        showToast('Error al actualizar la imagen', 'error');
    });
}

function showToast(message, type) {
    // Crear toast notification
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
    
    // Crear contenedor si no existe
    let toastContainer = document.getElementById('toast-container');
    if (!toastContainer) {
        toastContainer = document.createElement('div');
        toastContainer.id = 'toast-container';
        toastContainer.className = 'toast-container position-fixed top-0 end-0 p-3';
        toastContainer.style.zIndex = '10000';
        document.body.appendChild(toastContainer);
    }
    
    // Agregar toast
    toastContainer.insertAdjacentHTML('beforeend', toastHtml);
    const toastElement = toastContainer.lastElementChild;
    new bootstrap.Toast(toastElement).show();
    
    // Remover después de mostrar
    toastElement.addEventListener('hidden.bs.toast', () => {
        toastElement.remove();
    });
}
</script>
@endif 