class TeacherClassesController < ApplicationController
  before_action :set_teacher_class, only: [:show, :edit, :update, :destroy]

  # GET /teacher_classes
  # GET /teacher_classes.json
  def index
    @teacher_classes = TeacherClass.all
  end

  # GET /teacher_classes/1
  # GET /teacher_classes/1.json
  def show
  end

  # GET /teacher_classes/new
  def new
    @teacher_class = TeacherClass.new
  end

  # GET /teacher_classes/1/edit
  def edit
  end

  # POST /teacher_classes
  # POST /teacher_classes.json
  def create
    @teacher_class = TeacherClass.new(teacher_class_params)

    respond_to do |format|
      if @teacher_class.save
        format.html { redirect_to @teacher_class, notice: 'Teacher class was successfully created.' }
        format.json { render action: 'show', status: :created, location: @teacher_class }
      else
        format.html { render action: 'new' }
        format.json { render json: @teacher_class.errors, status: :unprocessable_entity }
      end
    end
  end

  # PATCH/PUT /teacher_classes/1
  # PATCH/PUT /teacher_classes/1.json
  def update
    respond_to do |format|
      if @teacher_class.update(teacher_class_params)
        format.html { redirect_to @teacher_class, notice: 'Teacher class was successfully updated.' }
        format.json { head :no_content }
      else
        format.html { render action: 'edit' }
        format.json { render json: @teacher_class.errors, status: :unprocessable_entity }
      end
    end
  end

  # DELETE /teacher_classes/1
  # DELETE /teacher_classes/1.json
  def destroy
    @teacher_class.destroy
    respond_to do |format|
      format.html { redirect_to teacher_classes_url }
      format.json { head :no_content }
    end
  end

  private
    # Use callbacks to share common setup or constraints between actions.
    def set_teacher_class
      @teacher_class = TeacherClass.find(params[:id])
    end

    # Never trust parameters from the scary internet, only allow the white list through.
    def teacher_class_params
      params.require(:teacher_class).permit(:school_id, :teacher_id, :subject_id, :classroom_id, :weekday, :start_time, :end_time)
    end
end
