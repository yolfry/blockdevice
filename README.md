# Block Device

This is a security plugin, to protect your server from devices that contain many Hackers like (Android)

Simply go to the plugin settings and add "true" to the device you want to lock. 

Supported Devices:

-AMAZON
-ANDROID
-DEDICATED
-GEAR_VR
-HOLOLENS
-IOS
-NINTENDO
-OSX
-PLAYSTATION
-TVOS
-UNKNOWN
-WIN32
-WINDOWS_10
-WINDOWS_PHONE
-XBOX

## config.yml (Example)

  ```yml
---
devicesBlock:
  AMAZON: false
  ANDROID: true        #Locked Device (Android)
  DEDICATED: false
  GEAR_VR: false
  HOLOLENS: false
  IOS: false
  NINTENDO: false
  OSX: false
  PLAYSTATION: false
  TVOS: false
  UNKNOWN: true         #Locked Device (Unknown devices)
  WIN32: false
  WINDOWS_10: true      #Locked Device (Windows 10)
  WINDOWS_PHONE: false
  XBOX: false
text:
  kick: "Currently this server is not available for your device."
  aDevices: "Available Devices:"
```





## Installation

No command only configuration

Before starting your server with this plugin, please run the phar file with PHP so as to configure the plugin.
