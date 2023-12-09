
## Setup and configura multiple languages
==================================================
Steps 1 =  intstall the laravel first - composer create-project laravel/laravel demo
steps 2. = set the multiple language swithcher drop down option in header as you wish.

#### Here HTML code 

<div class="col-md-1">
  <form id="language-form" action="{{ route('langSwitch') }}" method="POST">
    @csrf
    
    <select class="form-control Langchange" name="langSwitch" onchange="this.form.submit()">
        <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
        <option value="hi" {{ session()->get('locale') == 'hi' ? 'selected' : '' }}>Hindi</option> 
        <option value="kn" {{ session()->get('locale') == 'kn' ? 'selected' : '' }}>kannada</option>
    </select>
    
  </form>
</div>


![image](https://github.com/mdmuzaffer/roles-with-permissions-and-multi-languages/assets/58267203/00b58054-92dd-4632-bc20-f6414ff06386)
