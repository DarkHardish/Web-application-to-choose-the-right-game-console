@extends('layouts.default')
@section('page-content')


<div class="container" style="padding: 30px 0;">
<div class="row">
    <div class="col-md-12">
        <div class="review_form_wrapper">
            <div class="review-form">
                <div class="respond" class="comment-respond">
                    <form action="#" method="POST" id="commentform" class="comment-form" novalidate="">
                        <p class="comment-notes">
                            <span id="email-notes">Your email will not be published.</span> 
                        </p>
                        <div class="comment-form-rating">
                            <span> Your rating</span>
                            <p class="stars">
                                <label for="rated-1"></label>
                                <input type="radio" id="rated-1" name="rating" value="1">
                                <label for="rated-2"></label>
                                <input type="radio" id="rated-2" name="rating" value="2">
                                <label for="rated-3"></label>
                                <input type="radio" id="rated-3" name="rating" value="4">
                                <label for="rated-4"></label>
                                <input type="radio" id="rated-4" name="rating" value="4">
                                <label for="rated-5"></label>
                                <input type="radio" id="rated-5" name="rating" value="5" checked="checked">
                            </p>
                        </div>
                        <p class="comment-form-comment">
                            <label for="comment">Your Review<span class="required">*</span>
                            </label>
                            <textarea id="comment" name="comment" cols="45" rows="8"></textarea>
                        </p>
                        <p class="form-submit">
                            <input name="submit" type="submit" id="submit" class="submit" value="submit">
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
 