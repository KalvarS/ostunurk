
            function displayImg(src, picSource) {
                if(picSource == ''){ //kui pilti pole kuulutusse sisestatud, siis "pilt puudub" pilti me ju ei hakka suurendama.
                    return;
                }
                document.getElementById('largeImg').src = src;
                showLargeImagePanel();
                unselectAll();
                setTimeout(function() {
                    document.getElementById('largeImg').src = picSource;
                }, 1)
            }


            function showLargeImagePanel() {
                document.getElementById('largeImgPanel').style.display = 'block';
            }


            function unselectAll() {
                if(document.selection)
                    document.selection.empty();
                if(window.getSelection)
                    window.getSelection().removeAllRanges();
            }