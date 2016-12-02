    </div>
   <div class="jumbotron">
      <div class="container">
        <h1>Skapa ett event</h1>
        <p>Detta är en sida för att skapa event! </p>
        <p>Man fyller i vad event ska heta, vad eventet ska handla om och vart det ska vara</p>
      </div>
    </div>



  <div class="container">
    <form action="event/create" method="post">
      <div class="input-group input-group-lg">
        <span class="input-group-addon" id="sizing-addon1">@</span>
        <input type="text" class="form-control" name="UserID" id="UserID" placeholder="UserID" aria-describedby="sizing-addon1">
      </div>
      <div class="input-group input-group-lg" style="padding-top: 5px">
        <span class="input-group-addon" id="sizing-addon2">@</span>
        <input type="text" class="form-control" name="Eventname" id="Eventname" placeholder="Eventname" aria-describedby="sizing-addon1">
      </div>
      <p>Fylla i vad eventet ska heta</p>
      <div class="input-group input-group-lg" style="padding-top: 5px">
        <span class="input-group-addon" id="sizing-addon3">@</span>
        <input type="text" class="form-control" name="Description" id="Description" placeholder="Description" aria-describedby="sizing-addon1">
      </div>
      <p>Fylla i vad eventet ska handla om</p>
      <div class="input-group input-group-lg" style="padding-top: 5px">
        <span class="input-group-addon" id="sizing-addon4">@</span>
        <input type="text" class="form-control" name="Adress" id="Adress" placeholder="Adress" aria-describedby="sizing-addon1">
      </div>
      <p>Fylla i vart eventet ska vara </p>
      <div class="input-group input-group-lg" style="padding-top: 5px">
        <span class="input-group-addon" id="sizing-addon5">@</span>
        <input type="text" class="form-control" name="Longitude" id="Longitude" placeholder="Longitude" aria-describedby="sizing-addon1">
      </div>
      <div class="input-group input-group-lg" style="padding-top: 5px">
        <span class="input-group-addon" id="sizing-addon6">@</span>
        <input type="text" class="form-control" name="Latitude" id="Latitude" placeholder="Latitude" aria-describedby="sizing-addon1">
      </div>
      <p>Fylla i vilken sektion som det ska vara </p>
      <div class="input-group input-group-lg" style="padding-top: 5px">
        <span class="input-group-addon" id="sizing-addon7">@</span>
        <input type="text" class="form-control" name="Section" id="Section" placeholder="Section" aria-describedby="sizing-addon1">
      </div>
      <input type="button" 
                   value="Create" 
                   onclick="form.submit();" /> 
    </form>
  </div>

