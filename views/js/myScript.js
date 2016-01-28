var images = []
images.push("images/widescreen_landscape_wallpaper_63195_poster2000.jpg");
images.push("images/6877519-mountain-landscape-wallpaper.jpg");
images.push("images/tropical-landscape-wallpaper.jpg");
images.push("images/new-york%20landscape%20wallpaper86478.jpg");
images.push("images/Beautiful%20city%20landscape%20wallpapers%20960x800%20(07).jpg");
images.push("images/beautiful_night_landscape-1024x768.jpg");
images.push("images/trees%20stars%20artwork%20night%20landscapes%20night%20sky%201920x1080%20wallpaper_www.wall321.com_26.jpg");
images.push("images/Buildings_Street_Night_Lights-Urban_Landscape_Wallpaper_medium.jpg");
images.push("images/1QOCyDJ.jpg");


var imageButton = [images.length];
for (i = 0; i < images.length; i++)
{
    imageButton[i] = document.createElement('button');
    imageButton[i].type = "button";
    imageButton[i].className = 'btn btn-info btn-lg thumbnail';
    imageButton.title = images[i];
}

function main() {
   
    var galleryView = document.getElementById('usrPicGallery');
    var galleryView1 = document.createElement('div');
    galleryView1.id = "galleyView";
    loadGallery(galleryView1);
    galleryView.insertBefore(galleryView1, galleryView.childNodes[0]);

    loadSlide();

    loadPaginationButtons();
}
function loadGallery(galleryView1)
{
    
    for(i=0;i<images.length;i++)
    {
        var column = document.createElement('div');
        column.className = "col-md-3";
        var imagePic = document.createElement('img');
        imagePic.src = images[i];
        imagePic.style.width = '150px';
        imagePic.style.height = '150px';

        imageButton[i].appendChild(imagePic);
        column.appendChild(imageButton[i]);
        galleryView1.appendChild(column);
    }
}
function loadSlide()
{
    var slideInner = document.getElementById('carouselInner');
    for (i = 0; i < images.length; i++)
    {
        var slideImgDiv = document.createElement('div');
        if (i === 0) {
            slideImgDiv.className = "item active";
        }
        else {
            slideImgDiv.className = "item";
        }
           
        var slideImg = document.createElement('img');
        slideImg.src = images[i];
        slideImg.style.width = "820px";
        slideImg.style.height = "480px";
        slideImgDiv.appendChild(slideImg);
        slideInner.appendChild(slideImgDiv);
    }
    
}

function loadPaginationButtons()
{
    var album = document.getElementById('album');
    var pagination = document.createElement('ul');
    pagination.className='pagination';
    var paginationBtns=[2];
    for(i=0;i<2;i++)
    {
        var pagLink = document.createElement('a');
        paginationBtns[i] = document.createElement('li');
        if (i === 0)
            paginationBtns[i].className = 'active';
        
        pagLink.href = "#";
        paginationBtns[i].appendChild(pageLink);
        pagination.appendChild(paginationBtns[i]);
    }
    album.appendChild(pagination);
}
