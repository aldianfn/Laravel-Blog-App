const title = document.querySelector('#title');
const categoryName = document.querySelector('#name');
const slug = document.querySelector('#slug');

if(title){
    title.addEventListener('change', function() {
        fetch('/dashboard/post/create-slug?title=' + title.value)
        .then((response) => response.json())
        .then((data) => slug.value = data.slug);
    });   
}

if(categoryName) {
    categoryName.addEventListener('change', function() {
        console.log(categoryName);
        fetch('/dashboard/categories/create-slug?name=' + categoryName.value)
        .then((response) => response.json())
        .then((data) => slug.value = data.slug);
    });  
}

document.addEventListener('trix-file-accept', function(e) {
    e.preventDefault();
})

// Preview image
function previewImage() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector('.img-preview');

    const blob = URL.createObjectURL(image.files[0]);
    imgPreview.src = blob;

    imgPreview.style.display = 'block';

    // const oFReader = new FileReader();
    // oFReader.readAsDataURL(image.files[0]); 
    // oFReader.onload = function(oFREvent) {
    //     imgPreview.src = oFREvent.target.result;
    // }
}