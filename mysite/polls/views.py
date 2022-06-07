from django.shortcuts import render
from django.http import HttpResponse
 
from .models import WorkDescription
#from konlpy.tag import *
#hannaum = Hannaum()

# Create your views herett.
def index(request):
    works = WorkDescription.objects.all()
    return render(request, 'polls/polls.html',{"works":works})
        