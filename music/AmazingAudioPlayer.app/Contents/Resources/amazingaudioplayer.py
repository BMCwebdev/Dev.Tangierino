import sys
from PyQt4 import QtGui, QtCore 
from maindialog import MainDialog
            
def main():
    
    app = QtGui.QApplication(sys.argv)
    mainDialog = MainDialog()
    mainDialog.setWindowState(QtCore.Qt.WindowMaximized)
    mainDialog.initOptions()
    mainDialog.initWebKit()
    mainDialog.show()
    
    sys.exit(app.exec_())

if __name__ == '__main__':
    main()    