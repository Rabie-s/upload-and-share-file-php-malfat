let copyShareLinkBtn = document.getElementById('copyShareLinkBtn');
let shareLink = document.getElementById('shareLink');
let copyShareLinkMsg = document.getElementById('copyShareLinkMsg');

copyShareLinkBtn.addEventListener('click',function(){
    navigator.clipboard.writeText(shareLink.textContent);
    copyShareLinkMsg.style.display = "block";
    
    
})


/* shareLinkBtn.addEventListener('click',function(){
    navigator.clipboard.writeText(shareLink);
}) */
