<div>
    <div>
        <h5 class="card-header">Contact Form</h5>
        <div class="card-body">
            <form action="{{ route('contact form') }}" method='POST'>
                @csrf
                <div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-form-label">Name</label>
                    <input id="name" type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="phone" class="col-form-label">Phone</label>
                    <input id="phone" type="text" name="phone" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email" class="col-form-label">Email</label>
                    <input id="email" type="text" name="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="subject" class="col-form-label">Subject</label>
                    <input id="subject" type="text" name="subject" class="form-control">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" style="color: black;" rows="10" cols="38" placeholder="Message"></textarea>
                </div>
                <div class="form-group">
                    <input id="submit" type="submit" class="form-control btn-facebook" value='Send Message'>
                </div>
            </form>
        </div>
    </div>
</div>