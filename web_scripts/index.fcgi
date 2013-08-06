#!/usr/bin/env python
from debugutil import ztraceback, zwrite
try:
    import sys, os, time, threading, django.utils.autoreload
    os.environ['DJANGO_SETTINGS_MODULE'] = "iap.local_settings"
    os.environ['VIRTUAL_ENV'] = "%s/web_scripts/2014/iap" % os.environ['HOME']
    sys.path.insert(0, os.environ['VIRTUAL_ENV'])
    sys.path.insert(0, "%s/Scripts/django/iap" % os.environ['HOME'])
    os.chdir("%s/Scripts/django/iap" % os.environ['HOME'])

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
    runfastcgi(method="threaded", daemonize="false")
except Exception, e:
    zwrite("oops {0}".format(e))
    ztraceback()
