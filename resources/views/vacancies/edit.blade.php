@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/css/medium-editor.min.css" integrity="sha512-zYqhQjtcNMt8/h4RJallhYRev/et7+k/HDyry20li5fWSJYSExP9O07Ung28MUuXDneIFg0f2/U3HJZWsTNAiw==" crossorigin="anonymous" referrerpolicy="no-referrer" defer/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" defer/>
@endsection

@section('nav')
    @include('templates.adminNav')
@endsection

@section('content')
    <h1 class="text-center text-2xl mt-10 capitalize">Edit Vacancy: {{$vacancy->title}}</h1>
    @include('templates.formVacancy')
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/medium-editor/5.23.3/js/medium-editor.min.js" integrity="sha512-5D/0tAVbq1D3ZAzbxOnvpLt7Jl/n8m/YGASscHTNYsBvTcJnrYNiDIJm6We0RPJCpFJWowOPNz9ZJx7Ei+yFiA==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js" integrity="sha512-oQq8uth41D+gIH/NJvSJvVB85MFk1eWpMK6glnkg6I7EdMqC1XVkW7RxLheXwmFdG03qScCM7gKS/Cx3FYt7Tg==" crossorigin="anonymous" referrerpolicy="no-referrer" ></script>
    <script>
        Dropzone.autoDiscover = false;

        document.addEventListener('DOMContentLoaded', ()=>{
            const editor = new MediumEditor('.editable',{ toolbar: {
                buttons: ['bold', 'italic', 'underline', 'anchor', 'h2', 'h3', 'quote','justifyCenter', 'justifyRight', 'justifyLeft', 'justifyFull', 'orderedList', 'unorderedList'],
                static: true,
                sticky:true
                },
                placeholder:{
                    text: "Job's Info"
                }
            })
            editor.subscribe('editableInput', (e, editable)=>{
                const content = editor.getContent();
                document.querySelector('#description').value = content
            });

            editor.setContent( document.querySelector('#description').value )

            const dropzoneCreate = new Dropzone('#dropzoneCreate', {
                url: "/vacancies/images",
                acceptedFiles: '.png,.jpg,.jpeg,.gif,.bmp',
                addRemoveLinks:true,
                maxFiles: 1,
                headers:{
                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                },
                init: function (){
                    if(document.querySelector('#image').value.trim() )
                    {
                        let image = {};
                        image.name = document.querySelector('#image').value

                        this.options.addedfile.call(this, image)
                        this.options.thumbnail.call(this, image, `/storage/vacancies/${image.name} ` )
                        image.previewElement.classList.add('dz-sucess')
                        image.previewElement.classList.add('dz-complete')
                    }
                },
                success: function(file,response){
                    document.querySelector('#error').textContent = ''

                    //Input hidden value for save in db
                    document.querySelector('#image').value = response.correct

                    file.nameServer = response.correct
                },
                maxfilesexceeded: function(file){
                    if( this.files[1] != null ) {
                        this.removeFile(this.files[0]);
                        this.addFile(file);
                    }
                },
                removedfile: function(file, response){
                    file.previewElement.parentNode.removeChild(file.previewElement);

                    params = {
                        image: file.nameServer ?? document.querySelector('#image').value
                    }
                    axios.post('/vacancies/borrarimagen', params)
                        .then(response => console.log(response))
                }
            });
        })
    </script>
@endsection
