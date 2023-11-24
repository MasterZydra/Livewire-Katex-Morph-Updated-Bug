**Build docker image:**  
`> docker build -t livewirebug:latest .`

**Run docker image:**  
`> docker run --name livewirebug -e SSL_MODE=off --rm -p 8080:80 livewirebug:latest`

Reproduce the issue:
- Open `localhost:8080` in your webrowser
- You see the rho character after the button
- Open your browsers dev tools
- Click the button
- You will see two entries in your console:
  - "null"
  - Error message

The [Katex component](resources/views/components/katex.blade.php) uses a ULID so that the id of each component is unique.
After the livewire event is done, the "morph.updated" event in the Katex component is triggered. At this moment the element cannot be found.
