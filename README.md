
# **Otel Rezervasyon Sistemi**

Bu proje, bir otel rezervasyon sürecini simüle eden basit bir API uygulamasıdır. Laravel ve PHP kullanılarak geliştirilmiştir ve kullanıcıların otel listelerine göz atmasını, rezervasyon yapmasını ve ödeme işlemlerini gerçekleştirmesini sağlar.  

---

## **Özellikler**
- 🏨 Otel listesini görüntüleme  
- 📅 Rezervasyon oluşturma ve listeleme  
- 💳 Rezervasyon için ödeme yapma  
- 👤 Kullanıcı listesini görüntüleme  

---

## **Kurulum**

Proje ortamını yerel makinede çalıştırmak için aşağıdaki adımları takip edebilirsiniz:

1. **Depoyu klonlayın:**  
   ```bash
   git clone https://github.com/ddozgur/otelFiyat.git
   cd otelFiyat
   ```

2. **Gerekli bağımlılıkları yükleyin:**  
   ```bash
   composer install
   ```

3. **Ortam değişkenlerini ayarlayın:**  
   `.env` dosyasını oluşturun ve veritabanı bilgilerini girin. Örnek bir `.env` dosyası:  
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=otelFiyat
   DB_USERNAME=root
   DB_PASSWORD=
   
   ```

4. **Veritabanı tablolarını oluşturun:**  
   ```bash
   php artisan migrate
   ```

5. **Uygulamayı başlatın:**  
   ```bash
   php artisan serve
   ```

---

## **Route'lar ve Açıklamalar**

### **1. Kullanıcılar**
- **GET** `/api/users`: Kullanıcı listesini getirir.  



### **2. Oteller**
- **GET** `/api/hotels`: Tüm otel listesini getirir.  
  Örnek cevap:  
  ```json
  [
      {
          "id": 1,
          "name": "Sunrise Hotel",
          "city": "Antalya",
      }
  ]
  ```

### **3. Rezervasyonlar**
- **GET** `/api/reservations`: Tüm rezervasyonları getirir.  
- **POST** `/api/reservations`: Yeni bir rezervasyon oluşturur.  
  **Parametreler:**  
  ```json
  {
      "hotel_id": 1,
      "user_id": 5,
      "check_in": "2024-12-01",
      "check_out": "2024-12-05",
      "guest_count": 2
  }
  ```

### **4. Ödemeler**
- **POST** `/api/payments`: Bir rezervasyon için ödeme yapar.  
  **Parametreler:**  
  ```json
  {
      "reservation_id": 10,
      "amount": 500.00
  }
  ```
---

## **Teknolojiler**
- **Laravel**: Uygulama geliştirme framework'ü  
- **PHP**: Backend programlama dili  
- **MySQL**: Veritabanı  

