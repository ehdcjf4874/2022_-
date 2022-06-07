from django.shortcuts import render
from django.http import HttpResponse
 
from .models import WorkDescription
from konlpy.tag import *
import json
hannanum = Hannanum()
# Create your views herett.
def index(request):
    works = WorkDescription.objects.all()
    return render(request, 'polls/polls.html',{"works":works})

def Searchparams(request):
    if request.method == 'GET':
        q = request.GET['q']
        print(q)
        
        q= hannanum.nouns(q)
        print(q)
        result = WorkDescription.objects.filter(description__icontains=q)

        data = {
            'q':result.values()[0]['description']
        }
        return render(request,  'polls/result.html',data)      