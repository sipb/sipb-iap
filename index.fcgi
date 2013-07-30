#!/usr/bin/env python
import sys, os, time, threading, django.utils.autoreload
from debugutil import ztraceback, zwrite
sys.path.insert(0, "/mit/sipb-iap/Scripts/django/iap")
os.chdir("/mit/sipb-iap/Scripts/django/iap")
os.environ['DJANGO_SETTINGS_MODULE'] = "iap.local_settings"

def reloader_thread():
  while True:
    if django.utils.autoreload.code_changed():
      zwrite("Code reloaded")
      os._exit(3)
    time.sleep(1)
t = threading.Thread(target=reloader_thread)
t.daemon = True
t.start()

from django.core.servers.fastcgi import runfastcgi
try:
    runfastcgi(method="threaded", daemonize="false")
except Exception, e:
    zwrite("oops{0}".format(e))
    ztraceback()
