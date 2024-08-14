function generateCard(){

    const name=document.getElementById("name").value;
    const location=document.getElementById("location").value;
    const college_name=document.getElementById("college_name").value;
    const imageFile=document.getElementById("image").files[0];

    const imageUrl=URL.createObjectURL(imageFile);
     const photo=document.getElementById("photo");
    photo.innerHTML=`<img src="${imageUrl}" alt="Student Image" height="130px" width="100px" id="image" style="border-radius :10px;">`; 

    const content=document.getElementById("content");
    content.innerHTML=`
    <div>Name: ${name}</div>
    <div>College Name:${college_name}<div>
    <div>Address:${location}</div>
    `;
}