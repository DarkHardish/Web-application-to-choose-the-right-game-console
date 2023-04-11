@extends('layouts.default')
@section('page-content')

<div class="mb-3 flex flex-col ">
<div class="flex align-center flex-col">
        <div class ="flex items-center  px-80 mb-8 pt-80 justify-around ">
            <div class="flex flex-col items-center text-3xl gap-2 ">
               
                <div id="image-container" style="width:700px; height: 500px" class=" overflow-hidden flex items-center justify-content-center position-relative " >
                @foreach ($Konsole->images as $tok )
                        <img src="{{ asset('assets/images/'.$tok['image']) }}" alt="" class="rounded-2xl">
                @endforeach
                
                </div>
                <div class="flex gap-10">
                <button id="prev-button"><img src="/assets/images/forward.png" class="rotate-180 w-8"></button>
                <button id="next-button"><img src="/assets/images/forward.png" class=" w-8"></button>
                </div>
                <h5>{{ $Konsole['producent'] }}</h5>
                <h5 class="text-4xl font-extrabold">{{ str_replace("_", " ", $Konsole['nazwa']) }}</h5>
            </div>
            <table width="50%" class="text-base   ">
                <tr class="text-xl">
                  <th class="pb-1 pt-1">Produkt</th>
                  <th class="border-b text-center pb-1 pt-1">Producent</th>
                  <td class="border-b text-center pb-1 pt-1">{{ $Konsole['producent'] }}</td>
                </tr>
                <tr class="text-xl">
                    <th class="pb-1 pt-1"></th>
                    <th class="border-b text-center pb-1 pt-1">Cena</th>
                    <td class="border-b text-center pb-1 pt-1">{{ $Konsole['price'] }} zł</td>
                  </tr>
                <tr class="text-xl">
                  <th class="pb-1 pt-1">Informacje podstawowe</th>
                  <th class="border-b text-center pb-1 pt-1">Kolor</th>
                  <td class="border-b text-center pb-1 pt-1">{{ $Konsole['kolor'] }}</td>
                </tr>
                <tr class="text-xl">
                  <th class="pb-1 pt-1">Techniczne</th>
                  <th class="border-b text-center pb-1 pt-1">Pamięć RAM</th>
                  <td class="border-b text-center pb-1 pt-1">{{ $Konsole['GB'] }} GB</td>
                </tr>
                <tr class="text-xl">
                  <th class="pb-1 pt-1"></th>
                  <th class="border-b text-center pb-1 pt-1">Dysk twardy</th>
                  <td class="border-b text-center pb-1 pt-1">{{ $Konsole['dysk_twardy'] }} GB</td>
                </tr>
                <tr class="text-xl">
                  <th class="pb-1 pt-1"></th>
                  <th class="border-b text-center pb-1 pt-1">Wi-Fi</th>
                  <td class="border-b text-center pb-1 pt-1">{{ $Konsole['wifi'] }}</td>
                </tr>
                <tr class="text-xl">
                  <th class="pb-1 pt-1"></th>
                  <th class="border-b text-center pb-1 pt-1">Bluetooth</th>
                  <td class="border-b text-center pb-1 pt-1">{{ $Konsole['bluetooth'] }}</td>
                </tr>
                <tr class="text-xl">
                  <th class="pb-1 pt-1">Złącza</th>
                  <th class="border-b text-center">Wyjście wideo</th>
                  <td class="border-b text-center">{{ $Konsole['IO'] }}</td>
                </tr>
                <tr class="text-xl">
                  <th class="pb-1 pt-1"></th>
                  <th class="border-b text-center">Ethernet</th>
                  <td class="border-b text-center">{{ $Konsole['Ethernet'] }}</td>
                </tr>
                <tr class="text-xl">
                  <th class="pb-1 pt-1">Fizyczne</th>
                  <th class="border-b text-center">Wysokość [mm]</th>
                  <td class="border-b text-center pb-1 pt-1">{{ $Konsole['wysokosc'] }}</td>
                </tr>
                <tr class="text-xl">
                  <th class="pb-1 pt-1"></th>
                  <th class="border-b text-center pb-1 pt-1">Szerokość [mm]</th>
                  <td class="border-b text-center pb-1 pt-1">{{ $Konsole['szerokosc'] }}</td>
                </tr>
                <tr class="text-xl">
                  <th class="pb-1 pt-1"></th>
                  <th class="border-b text-center pb-1 pt-1">Głębokość [mm]</th>
                  <td class="border-b text-center pb-1 pt-1">{{ $Konsole['glebokosc'] }}</td>
                </tr>
                <tr class="text-xl">
                  <th class="pb-1 pt-1"></th>
                  <th class="border-b text-center pb-1 pt-1">Waga [kg]</th>
                  <td class="border-b text-center pb-1 pt-1">{{ $Konsole['waga'] }}</td>
                </tr>
              </table>





        </div>
       

    <div class="grid place-items-center col-span-2">
    <div class="comment-area  text-black w-1/2" >
       
        @auth
            <div class="card card-body mt-52">
                <h6 class="card-title text-2xl font-bold">Zostaw komentarz</h6>
            
                <form action="{{ url('comments') }}" method="POST" >
                    
                    @csrf
                    <input type="hidden" name="nazwa" value={{ $Konsole['nazwa'] }}>
                    <input type="hidden" name="rating">
                    <div class="form-group float-left" required>
                        <div class="col-sm-12" required>
                        <input class="star star-5" value="5" id="star-5" type="radio" name="rating" required/>
                        <label class="star star-5" for="star-5" required></label>
                        <input class="star star-4" value="4" id="star-4" type="radio" name="rating" required/>
                        <label class="star star-4" for="star-4" required></label>
                        <input class="star star-3" value="3" id="star-3" type="radio" name="rating" required/>
                        <label class="star star-3" for="star-3" required></label>
                        <input class="star star-2" value="2" id="star-2" type="radio" name="rating" required/>
                        <label class="star star-2" for="star-2" required></label>
                        <input class="star star-1" value="1" id="star-1" type="radio" name="rating" required/>
                        <label class="star star-1" for="star-1" required></label>
                        </div>
                    </div>

                    <textarea  name="comment_body" class="form-control "  rows="3" id="myTextarea" required></textarea>
                    <button type="submit" class="btn btn-primary me-2 bg-blue-500 mt-1 float-right" id="submitBtn">Dodaj</button>
                </form>
            
            </div>
            
        @else
            <p class="font-semibold text-white flex justify-center gap-2">
                <a href="/register" class="hover:underline">Register</a> or <a href="/login" class="hover:underline">Log in</a> to comemnt.
            </p>
        @endauth



<div class="flex gap-2 pt-2 justify-end">
        <div class="form-group flex-2">
            <select id="rating-dropdown" class="form-control">
              <option value="all">Wszystko</option>
              <option value="5">5 Gwiazdek</option>
              <option value="4">4 Gwiazdki</option>
              <option value="3">3 Gwiazdki</option>
              <option value="2">2 Gwiazdki</option>
              <option value="1">1 Gwiazdka</option>
            </select>
            
          </div>
          <div class="form-group flex-2">
          <input type="text" id="search-input" class="form-control" placeholder="Wyszukaj">
        </div>
</div>
        <div class="comments-area ">

        @forelse ($Konsole->comments as $comment)  
         
        <div class="comment-container  shadows-sm mt-3 boczek " data-rating="{{ $comment->rating }}">

    
            <div class="detail-area container my-0 py-0 ">
                <div class="row d-flex justify-content-center">
                  <div class="col-md-2 col-lg-10 col-xl-12">
                    <div class="card">
                      <div class="card-body p-4">
                        <div class="row">
                          <div class="col">
                            <div class="d-flex flex-start">
                                @if ($comment->user)
                                <img src="{{ asset('storage/avatars/' . $comment->user->id . '/' . $comment->user->avatar) }}"  style="width:5% ; height:50%; " class="rounded-xl mr-2 mb-1">
                                @endif
                              <div class="flex-grow-1 flex-shrink-1">
                                <div>
                                  <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex gap-3">
                                    <p class="mb-1 font-bold text-transparent text-lg  bg-clip-text bg-gradient-to-r from-purple-900 to-violet-800">
                                      {{ $comment->user->name }}</p> <p> <span class="small"><small class="ms-3 ml-2 text-primaty">{{  $comment->created_at->format('F j, Y, g:i a')}}</small></span>
                                    </p>
                                 
                                  
                                    <p> {{ $comment->rating }}/5
                                        @for ($i =0; $i<$comment->rating; $i++)
                                            <i class="fa fa-star text-yellow-300" aria-hidden="true"></i>
                                        @endfor
                                    </p>
                                  </div>
                                    <div class="d-flex justify-content-end gap-10">
                                    @if (Auth::check() && Auth::id()!= $comment->user_id)
                                    <button type="button" class="showreply" id="btn showreply-{{ $comment->id }}"><i class="fas fa-reply fa-xs"></i><span class="small"> reply</span></button>
                                    @endif
                                    @if (Auth::check() && Auth::id() == $comment->user_id)   
                                    <button id="edit-btn-{{ $comment->id }}" onclick="toggleEdit({{ $comment->id }})"><i class="fas fa-edit fa-xs" ></i><span class="small"> edit</span></button>
                                    <button value="{{ $comment->id }}" class="deleteComment" type="button"><i class="fas fa-trash fa-xs"></i><span class="small"> delete</span></button>
                                    @endif
                                  </div>
                                  </div>
                                  <p class="user-comment small mb-0"  id="comment-text-{{ $comment->id }}">
                                    {{$comment->comment_body}}
                                  </p>
                                </div>
                                <form id="edit-form-{{ $comment->id }}" action="{{ route('comments.update', $comment->id) }}" method="POST" style="display: none;">
                                    @method('PUT')
                                    @csrf
                                    <div class="d-flex gap-1">
                                    <input type="hidden" name="nazwa" value="{{ $Konsole['nazwa'] }}">
                                    <input type="text" name="comment_body" value="{{ $comment->comment_body }}" class="small mb-0 col-8">
                                    <button type="submit" class=""><i class="fas fa-save fa-lg"></i></button>
                                    </div>
                                </form>
                              </div>
                            </div> 
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>













            
            
              
       
          
                
           
            
    
        
        </div>
   
        <div class="detail-area replies-area container my-2 py-0" id="replies-{{ $comment->id }}">
            <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-lg-10 col-xl-12">
            <div class="card">
            <div class="card-body p-3">
            <div class="row">
            <div class="col">
                <div class="reply-container d-flex flex-start">
                  @auth
                  <img src="{{ asset('storage/avatars/' . Auth::user()->id . '/' . Auth::user()->avatar) }}" style="width:5% ; height:50%; " class="rounded-xl mr-2 mb-1">
                    
                    
                   <div class="flex-grow-1 flex-shrink-1">
                    <form action="{{ route('replies.store') }}" method="POST">
                      @csrf  
                      <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                      
                     <div>
                       <div class="d-flex justify-content-between align-items-center">
                         <p class="mb-1 font-bold text-transparent text-lg  bg-clip-text bg-gradient-to-r from-purple-900 to-violet-800">
                          {{ Auth::user()->name }}</p><p> <span class="small"></span>
                         </p>
                         <div class="d-flex justify-content-end">
                         <button type="submit"><i class="fas fa-add fa-xl" ></i><span class="small"> add</span></button>
                         </div>
                       </div>
                           <p class="user-reply small  ">
                           <textarea class="small  border p-2 col-12"  name="comment_reply_body"  placeholder="Dodaj odpowiedź dla {{$comment->user->name }}" required></textarea>
                           </p>
                     </div>
                   </div>
                    </form>
                    @endauth
                 </div> 
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
        </div>

     
        @if(count($comment->replies) > 0)
        <div class="reply-container  shadows-sm  boczek my-2" data-rating="{{ $comment->rating }}">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10 col-lg-10 col-xl-11">
                <div class="card">
                <div class="card-body">
                <div class="row">
                <div class="col">


            @foreach($comment->replies as $reply)
            <div class="reply-container d-flex flex-start my-2">
                <img src="{{ asset('storage/avatars/' . $reply->user->id . '/' . $reply->user->avatar) }}" style="width:5% ; height:50%; " class="rounded-xl mr-2 mb-1 object-contain">
              <div class="flex-grow-1 flex-shrink-1">
                <div>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="d-flex gap-3">
                    <p class="mb-1 font-bold text-transparent text-lg  bg-clip-text bg-gradient-to-r from-purple-900 to-violet-800">
                      {{ $reply->user->name }}</p><p> <span class="small"><small class="ms-3 ml-2 text-primaty">{{  $reply->created_at->format('F j, Y, g:i a')}}</small></span>
                    </p>
                    </div>
                    <div class="d-flex justify-content-end gap-10">
                    @if (Auth::check() && Auth::id() == $reply->user_id)   
                    <button id="edit-btn-{{ $reply->id }}" onclick="toggleEdit2({{ $reply->id }})"><i class="fas fa-edit fa-xs" ></i><span class="small"> edit</span></button>
                    <button value="{{ $reply->id }}" class="deleteReply" type="button"><i class="fas fa-trash fa-xs"></i><span class="small"> delete</span></button>
                    @endif
                    </div>
                  </div>
                      <p class="user-reply small mb-0 "  id="reply-text-{{ $reply->id }}">
                        {{$reply->comment_reply_body}}
                      </p>
                  
                </div>

                <form id="edit-form-{{ $reply->id }}" action="{{ route('reply.update', $reply->id) }}" method="POST" style="display: none;">
                    @method('PUT')
                    @csrf
                    <div class="d-flex gap-1">
                    <input type="hidden" name="nazwa" value="{{ $Konsole['nazwa'] }}">
                    <input type="text" name="comment_reply_body" value="{{ $reply->comment_reply_body }}" class="small  col-8">
                    <button type="submit" class=" "><i class="fas fa-save fa-lg"></i></button>
                    </div>
                </form>
              </div>
         
              





              
            </div> 
            @endforeach
                </div>
                </div>
                </div>
                </div>
                </div>
            </div>

            
        </div>

        






        @endif
        @empty
        <h6>No Comments Yet</h6>
        @endforelse
    </div>
    


    

@endsection

@section('scripts')
    

<script>
$(document).ready(function(){
  $("#search-input").on("input", function(){
    const word = $("#search-input").val();
    const comments = $('.boczek');
    const filteredComments = comments.filter((i, comment) => {
        return $(comment).text().includes(word);
    });
    comments.hide();
    filteredComments.show();
  });
});

document.getElementById("rating-dropdown").addEventListener("change", sortComments);

function sortComments() {
    // Get the selected rating from the dropdown
    var rating = document.getElementById("rating-dropdown").value;
    // Get all the comment elements
    var comments = document.querySelectorAll(".boczek");
    // Loop through each comment
    comments.forEach(function(comment) {
        // Get the rating value of the comment
        var commentRating = parseInt(comment.getAttribute("data-rating"));
        if (rating == "all") {
            // Show all comments if the "All" option is selected
            comment.style.display = "block";
        }
        else if (commentRating == rating) {
            // Show the comment if the rating matches the selected rating
            comment.style.display = "block";
        } else {
            // Hide the comment if the rating does not match the selected rating
            comment.style.display = "none";
        }
    });
}




$(document).ready(function(){
    var currentImageIndex = 0;
    var $images = $("#image-container img");
    $images.hide();
    $images.eq(currentImageIndex).show();
    $("#next-button").click(function(){
        currentImageIndex = (currentImageIndex + 1) % $images.length;
        $images.animate({
            left: "-=64px"
        }, 500, function(){
            $images.eq(currentImageIndex).css("left", "0px").fadeIn(500);
            $images.not(":eq("+currentImageIndex+")").hide();
        });
    });
    $("#prev-button").click(function(){
        currentImageIndex = (currentImageIndex - 1 + $images.length) % $images.length;
        $images.animate({
            left: "+=64px"
        }, 500, function(){
            $images.eq(currentImageIndex).css("left", "0px").fadeIn(500);
            $images.not(":eq("+currentImageIndex+")").hide();
        });
    });
});


function toggleEdit(commentId) {
    let commentText = document.getElementById(`comment-text-${commentId}`);
    let editForm = document.getElementById(`edit-form-${commentId}`);
    let editBtn = document.getElementById(`edit-btn-${commentId}`);
    if(editForm.style.display === "none") {
        editForm.style.display = "block";
        commentText.style.display = "none";

    } else {
        editForm.style.display = "none";
        commentText.style.display = "block";
     
    }
}
function toggleEdit2(replyId) {
    let commentText = document.getElementById(`reply-text-${replyId}`);
    let editForm = document.getElementById(`edit-form-${replyId}`);
    let editBtn = document.getElementById(`edit-btn-${replyId}`);
    if(editForm.style.display === "none") {
        editForm.style.display = "block";
        commentText.style.display = "none";
       
    } else {
        editForm.style.display = "none";
        commentText.style.display = "block";
        
    }
}
$(document).ready(function(){
    // hide all replies-area by default
    $('.replies-area').hide();

    // toggle replies-area visibility when showreply button is clicked
    $('.showreply').click(function(){
        var commentId = $(this).attr("id").split("-")[1];
        var repliesArea = $('#replies-' + commentId);
        var button = $(this);
        if (repliesArea.is(':visible'))
         {
            repliesArea.hide();
            button.html(' <i class="fas fa-reply fa-xs"></i><span class="small"> reply</span>');
        } else {
            repliesArea.show();
            button.html('<i class="fas fa-close fa-xs"></i><span class="small"> close</span>');
        }
    });
});




    $(document).ready(function()
    {
        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
        $(document).on('click','.deleteComment',function(){
                    var thisClicked = $(this);
                    var comment_id = thisClicked.val();
                    $.ajax({
                        type: "POST",
                        url: "/delete-comment",
                        data: {
                            'comment_id': comment_id
                        },
                        success:function(res){
                            if(res.status == 200){
                                thisClicked.closest('.comment-container').remove();
                               
                            }else{
                                alert(res.message);
                            }
                        }
                    });
                
        });
    });

    $(document).on('click','.deleteReply',function(){
              
                    var thisClicked = $(this);
                    var reply_id = thisClicked.val();
                    $.ajax({
                        type: "POST",
                        url: "/delete-reply",
                        data: {
                            'reply_id': reply_id
                        },
                        success:function(res){
                            if(res.status == 200){
                                thisClicked.closest('.reply-container').remove();
                                
                            }else{
                                alert(res.message);
                            }
                        }
                    });
                
        });
</script>

@endsection