document.getElementById('previewImage').addEventListener('click', function() {
    
    this.style.display = 'none';

    
    const modal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');

    modal.style.display = 'flex';
    modalImage.src = this.src;
    modalImage.style.maxWidth = "90vw"; 
    modalImage.style.maxHeight = "90vh"; 
});

function closeModal() {
    
    document.getElementById('previewImage').style.display = 'block';

   
    document.getElementById('imageModal').style.display = 'none';
}
