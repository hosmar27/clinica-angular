AngularJS frontend for appointments

Files:

- `index.html` — simple AngularJS UI under `docs/angularjs`.
- `app.js` — AngularJS app/controller that calls `/api/appointments`.

How to run:

1. Ensure your Laravel app is running (example):

```bash
php artisan serve
```

2. Serve the `docs/angularjs` folder with a static server (from the repository root):

```bash
cd docs/angularjs
python3 -m http.server 8080
# then open http://localhost:8080 in your browser
```

Notes:

- The frontend makes AJAX calls to `/api/appointments`. If `php artisan serve` runs on a different host/port, you may need to adjust the API URLs or run the static server with CORS allowance / use a proxy.
- Endpoints expect authenticated calls if your API is protected; either disable auth for local testing or use a token header in `$http` requests.
