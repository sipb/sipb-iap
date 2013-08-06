#!/usr/bin/python
import os, time, sys, socket, sys, traceback, logging
try:
    import thread
except ImportError:
    pass
import threading

(SPEW,DEBUG,INFO,WARN,ERROR,FATAL) = (0,1,2,3,4,5)

debug_level=SPEW

def zwrite(msg,urgency=DEBUG):
    """use this for printline debugging"""
    if urgency < debug_level:
        return
    user = "-c sipb-iap-dbg"
    try:
        os.system("zwrite -d %s -m '%s'" % (user,msg))
    except Exception,e:
        try: 
            os.system("zwrite -d -c afarrell-dbg -i sipb-iap -m 'ZWRITE ERROR FROM SIPB_IAP %s'" % user)
            os.system("zwrite -d -c afarrell-dbg -i sipb-iap -m '%s'" % str(sys.exc_info()))
            os.system("zwrite -d -c afarrell-dbg -i sipb-iap -m '%s'" % str(e))
            os.system("zwrite -d -c afarrell-dbg -i sipb-iap -m 'real message \n%s'" % msg)
        except:
            pass
def ztraceback():
    zwrite(traceback.format_exc())

class ZlogHandler(logging.Handler):
    def emit(self, record):
        zwrite(record)
