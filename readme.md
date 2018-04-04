## "Погодный бот" для "Telegram" (тестовое задание)

- Бот использует API Telegram и OpenWeatherMap (<a href="https://openweathermap.org">клик</a>)
Для использования приложения вам понадобиться api-token Telegram и OpenWeather.
Пожалуйста, внесите их в файл .env как WEATHER_TOKEN и TELEGRAM_BOT_TOKEN соответственно.

- Инициализируйте WebHook TelegramBot (самый простой способ: построить ссылку вида
 https://api.telegram.org/BOT_TOKEN/setWebhook?url=MY_DOMAIN/api/bot_speak). Telegram 
 отправит вам JSON-ответ с подтверждением успешной установки WebHook.
 
 - <b>WARNING!</b> API Telegram "любит" только HTTPS-домены! Используйте HTTPS, либо
 примените для тестирования ngrok.
 
 - Выполните настройку web-сервера для приложения Laravel (корневая папка - public)
 
 - Выполните в корне приложения composer install
