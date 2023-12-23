FROM lorisleiva/laravel-docker:8.1
EXPOSE 8000

COPY .  /var/www

RUN rm -f composer.lock
RUN composer install

CMD php artisan --host=0.0.0.0 serve
